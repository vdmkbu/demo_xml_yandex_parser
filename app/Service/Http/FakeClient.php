<?php


namespace App\Service\Http;


class FakeClient implements HttpClient
{
    public function request(array $query)
    {
        return $this->fakeXML();
    }

    private function fakeXML()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
<yandexsearch version="1.0">
  <request>
    <query>
      Новости Екб
    </query>
    <page>
    </page>
    <sortby order="descending" priority="no">
      tm
    </sortby>
    <maxpassages>
    </maxpassages>
    <groupings>
      <groupby attr="d" mode="deep" groups-on-page="5" docs-in-group="2" curcateg="-1" />
    </groupings>
  </request>
  <response date="20201218T082720">
    <reqid>
      1608280040494593-969996269427903639000108-production-app-host-vla-web-yp-346-XML
    </reqid>
    <found priority="phrase">
      1310147
    </found>
    <found priority="strict">
      1310147
    </found>
    <found priority="all">
      1310147
    </found>
    <found-human>
      Нашёлся 1 млн ответов
      </found-human>
    <is-local>
      no
      </is-local>
    <results>
      <grouping attr="d" mode="deep" groups-on-page="5" docs-in-group="2" curcateg="-1">
        <found priority="phrase">
          616
        </found>
        <found priority="strict">
          616
        </found>
        <found priority="all">
          616
        </found>
        <found-docs priority="phrase">
          3288237
          </found-docs>
        <found-docs priority="strict">
          3288237
          </found-docs>
        <found-docs priority="all">
          3288237
          </found-docs>
        <found-docs-human>
          нашёл 3 млн ответов
          </found-docs-human>
        <page first="1" last="5">
          0
        </page>
        <group>
          <categ attr="d" name="echoekb.ru" />
          <doccount>
            24
          </doccount>
          <relevance />
          <doc id="Z3D71753972076E52">
            <relevance />
            <url>
              https://www.echoekb.ru/news/2020/12/18/90718/
            </url>
            <domain>
              www.echoekb.ru
            </domain>
            <title>
              Во время пандемии в Свердловской области в три раза выросло...
            </title>
            <modtime>
              20201218T111808
            </modtime>
            <size>
              1098
            </size>
            <charset>
              windows-1251
            </charset>
            <passages>
              <passage>
                © 2020 «Эхо Москвы в
                <hlword>
                  Екатеринбурге
                </hlword>
                ».
                <hlword>
                  Екатеринбург
                </hlword>
                , пр. Ленина, 41, mail@echoekb.ru.
              </passage>
              <passage>
                Подписаться на
                <hlword>
                  новости
                </hlword>
                . Отправить
                <hlword>
                  новость
                </hlword>
                . Написать письмо.
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608279552&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fwww.echoekb.ru%2Fnews%2F2020%2F12%2F18%2F90718%2F&amp;l10n=ru&amp;mime=html&amp;sign=9a536e0249a67b2d3a67154d59579174&amp;keyno=0
              </saved-copy-url>
            <snippets>
              <adresa applicable="0" type="adresa">
                <types>
                  snippets
                </types>
                <types>
                  adresa
                </types>
              </adresa>
            </snippets>
          </doc>
          <doc id="Z75F489CFBFE47D71">
            <relevance />
            <url>
              https://www.echoekb.ru/news/2020/12/18/90720/
            </url>
            <domain>
              www.echoekb.ru
            </domain>
            <title>
              Этой ночью с улиц
              <hlword>
                Екатеринбурга
              </hlword>
              вывезли почти 450 тонн снега
            </title>
            <modtime>
              20201218T112214
            </modtime>
            <size>
              1072
            </size>
            <charset>
              windows-1251
            </charset>
            <passages>
              <passage>
                Весь выпавший снег вывезли на снегоприёмные полигоны, сообщается на официальном портале
                <hlword>
                  Екатеринбурга
                </hlword>
                .
              </passage>
              <passage>
                21 декабря Утренний разворот на
                <hlword>
                  Екатеринбург
                </hlword>
                В прямом эфире после 9:30.
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608279552&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fwww.echoekb.ru%2Fnews%2F2020%2F12%2F18%2F90718%2F&amp;l10n=ru&amp;mime=html&amp;sign=9a536e0249a67b2d3a67154d59579174&amp;keyno=0
              </saved-copy-url>
            <snippets>
            </snippets>
          </doc>
        </group>
        <group>
          <categ attr="d" name="mchs.gov.ru" />
          <doccount>
            2
          </doccount>
          <relevance />
          <doc id="Z47186B125792A38F">
            <relevance />
            <url>
              https://66.mchs.gov.ru/deyatelnost/press-centr/operativnaya-informaciya/4334633
            </url>
            <domain>
              66.mchs.gov.ru
            </domain>
            <title>
              Пожарно-спасательное подразделение привлекалось на...
            </title>
            <modtime>
              20201218T111849
            </modtime>
            <size>
              1707
            </size>
            <charset>
              utf-8
            </charset>
            <passages>
              <passage>
                Пожарно-спасательное подразделение привлекалось на ликвидацию последствий ДТП в г.
                <hlword>
                  Екатеринбурге
                </hlword>
                .
                <hlword>
                  Новости
                </hlword>
                Хроника событий Covid-19 МЧС-101 СМИ о нас Оперативная...
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608279552&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2F66.mchs.gov.ru%2Fdeyatelnost%2Fpress-centr%2Foperativnaya-informaciya%2F4334633&amp;l10n=ru&amp;mime=html&amp;sign=8069b586b8a9cb85d89dd3fb4d06e660&amp;keyno=0
              </saved-copy-url>
            <snippets>
              <adresa applicable="0" type="adresa">
                <types>
                  snippets
                </types>
                <types>
                  adresa
                </types>
              </adresa>
            </snippets>
          </doc>
        </group>
        <group>
          <categ attr="d" name="e1.ru" />
          <doccount>
            25484
          </doccount>
          <relevance />
          <doc id="ZB128E18473BE356A">
            <relevance />
            <url>
              https://www.e1.ru/text/health/2020/12/18/69638991/comments/
            </url>
            <domain>
              www.e1.ru
            </domain>
            <title>
              Комментарии к материалу... | e1.ru -
              <hlword>
                новости
              </hlword>
              <hlword>
                Екатеринбурга
              </hlword>
            </title>
            <headline>
              Все комментарии к материалу Лаборатория сообщила, что у 52% екатеринбуржцев есть антитела к коронавирусу. Это похоже на правду?. Количество комментариев 0...
            </headline>
            <modtime>
              20201218T110636
            </modtime>
            <size>
              1145
            </size>
            <charset>
              utf-8
            </charset>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608278784&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fwww.e1.ru%2Ftext%2Fhealth%2F2020%2F12%2F18%2F69638991%2Fcomments%2F&amp;l10n=ru&amp;mime=html&amp;sign=596246735729835fabe2b8c114afe03a&amp;keyno=0
              </saved-copy-url>
            <snippets>
              <adresa applicable="0" type="adresa">
                <types>
                  snippets
                </types>
                <types>
                  adresa
                </types>
              </adresa>
            </snippets>
          </doc>
          <doc id="ZC8D469A85E3AE931">
            <relevance />
            <url>
              https://www.e1.ru/news/spool/news_id-69632106.html?rec=editorial
            </url>
            <domain>
              www.e1.ru
            </domain>
            <title>
              Список школ по прописке на 2021... | e1.ru -
              <hlword>
                новости
              </hlword>
              <hlword>
                Екатеринбурга
              </hlword>
            </title>
            <modtime>
              20201218T111704
            </modtime>
            <size>
              1610
            </size>
            <charset>
              utf-8
            </charset>
            <passages>
              <passage>
                В
                <hlword>
                  Екатеринбурге
                </hlword>
                перенесли сроки публикации перечня школ по прописке. В
                <hlword>
                  Екатеринбурге
                </hlword>
                окончательные списки закрепленных за школами территорий будут сформированы только...
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608278784&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fwww.e1.ru%2Ftext%2Fhealth%2F2020%2F12%2F18%2F69638991%2Fcomments%2F&amp;l10n=ru&amp;mime=html&amp;sign=596246735729835fabe2b8c114afe03a&amp;keyno=0
              </saved-copy-url>
            <snippets>
            </snippets>
          </doc>
        </group>
        <group>
          <categ attr="d" name="newdaynews.ru" />
          <doccount>
            3530
          </doccount>
          <relevance />
          <doc id="Z5013940081A5E609">
            <relevance />
            <url>
              https://newdaynews.ru/ekaterinburg/711746.html
            </url>
            <domain>
              newdaynews.ru
            </domain>
            <title>
              <hlword>
                Екатеринбург
              </hlword>
              . Другие
              <hlword>
                новости
              </hlword>
              18.12.20
            </title>
            <modtime>
              20201218T105743
            </modtime>
            <size>
              1121
            </size>
            <charset>
              utf-8
            </charset>
            <passages>
              <passage>
                <hlword>
                  Екатеринбург
                </hlword>
                . Другие
                <hlword>
                  новости
                </hlword>
                18.12.20. Полицейские рассказали, что делать родителям при пропаже ребенка. /
              </passage>
              <passage>
                Адрес уральской редакции:
                <hlword>
                  Екатеринбург
                </hlword>
                , ул. Радищева, 6-А, офис 906.
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608279680&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fnewdaynews.ru%2Fekaterinburg%2F711746.html&amp;l10n=ru&amp;mime=html&amp;sign=ab43e1d89b3d29ed6c3d99f2d21aa4d2&amp;keyno=0
              </saved-copy-url>
            <snippets>
              <adresa applicable="0" type="adresa">
                <types>
                  snippets
                </types>
                <types>
                  adresa
                </types>
              </adresa>
            </snippets>
          </doc>
          <doc id="Z750C9D79F24D80AA">
            <relevance />
            <url>
              https://newdaynews.ru/ekaterinburg/711748.html
            </url>
            <domain>
              newdaynews.ru
            </domain>
            <title>
              <hlword>
                Екатеринбург
              </hlword>
              . Другие
              <hlword>
                новости
              </hlword>
              18.12.20
            </title>
            <modtime>
              20201218T111643
            </modtime>
            <size>
              1851
            </size>
            <charset>
              utf-8
            </charset>
            <passages>
              <passage>
                <hlword>
                  Екатеринбург
                </hlword>
                . Другие
                <hlword>
                  новости
                </hlword>
                18.12.20. Под Нижней Турой разбилась водитель, ехавшая с превышением скорости по трассе (ФОТО). / Полицейские рассказали, что делать родителям...
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608279680&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fnewdaynews.ru%2Fekaterinburg%2F711746.html&amp;l10n=ru&amp;mime=html&amp;sign=ab43e1d89b3d29ed6c3d99f2d21aa4d2&amp;keyno=0
              </saved-copy-url>
            <snippets>
            </snippets>
          </doc>
        </group>
        <group>
          <categ attr="d" name="zakupis-ekb.ru" />
          <doccount>
            4
          </doccount>
          <relevance />
          <doc id="Z5E8BF31CABAD37D4">
            <relevance />
            <url>
              https://zakupis-ekb.ru/stock/items/platya-novye-rasprodazha-cvet-bez-vybora-1274188
            </url>
            <domain>
              zakupis-ekb.ru
            </domain>
            <title>
              Платья Новые. Распродажа &quot;Цвет без выбора&quot; купить...
            </title>
            <modtime>
              20201218T092411
            </modtime>
            <size>
              1029
            </size>
            <charset>
              windows-1251
            </charset>
            <passages>
              <passage>
                Совместные закупки
                <hlword>
                  Екатеринбург
                </hlword>
                . Отмена. Зарегистрировано на сайте.
              </passage>
            </passages>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608275712&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fzakupis-ekb.ru%2Fstock%2Fitems%2Fplatya-novye-rasprodazha-cvet-bez-vybora-1274188&amp;l10n=ru&amp;mime=html&amp;sign=78409e0a5fbf87db5fcd9c98dd25cccf&amp;keyno=0
              </saved-copy-url>
            <snippets>
              <adresa applicable="0" type="adresa">
                <types>
                  snippets
                </types>
                <types>
                  adresa
                </types>
              </adresa>
            </snippets>
          </doc>
          <doc id="ZB4D399ED2863BCC5">
            <relevance />
            <url>
              https://kamensk.zakupis-ekb.ru/stock/items/platya-novye-1274189
            </url>
            <domain>
              kamensk.zakupis-ekb.ru
            </domain>
            <title>
              Платья Новые купить в Каменске-Уральском, Платья | Объявления...
            </title>
            <headline>
              Купить платья новые в Каменске-Уральском. В наличии. Самовывоз и доставка. Платья Новые. Ткань креп Передача в ЦР 26 декабря! По Размерам: 48 50 52 54 56 58 60 РАЗМЕР и ЦВЕ...
            </headline>
            <modtime>
              20201218T111504
            </modtime>
            <size>
              1021
            </size>
            <charset>
              windows-1251
            </charset>
            <properties>
              <_PassagesType>
                0
              </_PassagesType>
              <lang>
                ru
              </lang>
            </properties>
            <mime-type>
              text/html
              </mime-type>
            <saved-copy-url>
              https://yandexwebcache.net/yandbtm?lang=ru&amp;fmode=inject&amp;tm=1608280040&amp;tld=ru&amp;la=1608275712&amp;text=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D1%82%D0%B8%20%D0%95%D0%BA%D0%B1&amp;url=https%3A%2F%2Fzakupis-ekb.ru%2Fstock%2Fitems%2Fplatya-novye-rasprodazha-cvet-bez-vybora-1274188&amp;l10n=ru&amp;mime=html&amp;sign=78409e0a5fbf87db5fcd9c98dd25cccf&amp;keyno=0
              </saved-copy-url>
            <snippets>
            </snippets>
          </doc>
        </group>
      </grouping>
    </results>
  </response>
</yandexsearch>';
    }

}
