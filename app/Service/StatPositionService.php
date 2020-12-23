<?php


namespace App\Service;


use App\Repositories\PositionRepository;


class StatPositionService
{
    protected PositionRepository $repository;

    public function __construct(PositionRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getPositions($current_positions, $previous_positions)
    {
        $result = [];
        $result_pos = [];

        foreach($current_positions as $word_index => $position) {

            foreach(explode(',',$position->positions) as $positions_index => $pos) {

                $difference = $this->countDifference($pos, $previous_positions, $word_index, $positions_index);

                // добавим в массив позиция (текущая позиция => разница со сравнению со вчерашним днем)
                if ($pos == 0) {
                    // если pos == 0, значит данные об позиции не найдены
                    $result_pos[] = [
                        "-" => $difference
                    ];
                }
                else {
                    $result_pos[] = [
                        $pos => $difference
                    ];
                }

            }

            // результат для вывода
            $result[] = [
                'word' => $position->word->word,
                'positions' => $result_pos
            ];

            $result_pos = [];
        }

        return $result;
    }

    public function getPositionsDynamic($project_id, $regions, $words, $size)
    {
        $months = [];
        // последние дни каждого из $size месяцев
        for($month = $size; $month >= 1; $month--) {
            $months[] = now()->subMonth($month)->endOfMonth()->toDateString();
        }

        $result = [];
        foreach($regions as $region) {

            $rows = [];

            foreach($words as $word) {

                // начинаем формировать строку, начинаем со слова
                $row = [$word->word->word];

                foreach($months as $month) {

                    $position = $this->repository->getPosition($project_id, $region->region->id, $word->word->id, $month);

                    if ($position) {
                        // если нашли значение позиции, то добавим к массиву, в котором хранится строка
                        $row = array_merge($row, [$position->pos ?: '-']);
                    }
                    else {
                        // если не нашли, то добавляем прочерк
                        $row = array_merge($row, ['-']);
                    }


                }

                // добавим к массиву, который хранит все строки
                $rows[] = $row;

                $row = [];

            }


            // в результате формируем строку заголовка для таблицы: запрос + массив дат
            // в data хранится массив строк с позициями: искомое слово + позиции для каждой даты
            $result[] = [
                'region' => $region->region->region,
                'header' => array_merge(['Запрос'], $months),
                'data' => $rows
            ];


        }

        return $result;
    }

    private function countDifference($current_pos, $previous_positions, $word_index, $positions_index)
    {
        $difference = null;

        // если есть данные об предыдущих позициях, то сформируем данные об разнице позиций между сегодня и вчера
        if ($previous_positions->count()) {
            $prev_pos = explode(',',$previous_positions[$word_index]->positions)[$positions_index];

            if ($prev_pos - $current_pos > 0) {
                $difference = "+" . ($prev_pos - $current_pos);
            }
            elseif ($prev_pos == 0) {
                $difference = "∞";
            }
            else {
                $difference = $prev_pos - $current_pos;
            }
        }

        return $difference;
    }

}
