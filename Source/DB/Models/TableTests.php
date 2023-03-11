<?php
/**
 * @package wp-presentation-tests
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
 */
namespace wppt\DB\Models;
use wppt\DB\Interfaces\ITable;

class TableTests implements ITable
{
  private $wpdb;

//   private $demoTests = [
//         [
//           'title' => 'Как часто наблюдается коморбидность в детском возрасте?',
//           'number' => '0',
//           'questions' => [
//               [
//                 'name' => 'a.	Часто',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Редко',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Зависит от возраста',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Нет, это удел взрослых',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'e.	Не знаю',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Атопический марш. Коморбидное состояние?',
//           'number' => '1',
//           'questions' => [
//               [
//                 'name' => 'a.	Да',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Нет',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Не знаю',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Метаболический синдром у детей и подростков. Коморбидное состояние?',
//           'number' => '2',
//           'questions' => [
//               [
//                 'name' => 'a.	Да',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Нет',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Не знаю',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Детский воспалительный мультисистемный синдром (PIMS), ассоциированный с COVID-19?',
//           'number' => '3',
//           'questions' => [
//               [
//                 'name' => 'a.	Да',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Нет',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Не знаю',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Что облегчает боль?',
//           'number' => '4',
//           'questions' => [
//               [
//                 'name' => 'a.	Положение лежа',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Положение на животе',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Положение на левом боку',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Положение на правом боку',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'e.	Положение сидя',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'f.	Наклон вперед',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'g.	Положение сидя, прижав ладони справа к животу',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Связь с едой',
//           'number' => '5',
//           'questions' => [
//               [
//                 'name' => 'a.	Усиливаться после еды сразу',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Усиливаться после еды через 1-2 часа',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Натощак',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Не связана с едой ',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Характер стула, характерный для панкреатита?',
//           'number' => '6',
//           'questions' => [
//               [
//                 'name' => 'a.	Запор',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Жидкий',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Жирный',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Проведено обследование согласно клиническим рекомендациям',
//           'number' => '7',
//           'questions' => [
//               [
//                 'name' => 'a.	Потовая проба',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	УЗИ органов брюшной полости',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	ДНК-диагностика',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Эластаза кала',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'e.	КТ органов грудной клетки',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'f.	КТ пазух носа',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'g.	ФГДС',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Результат потовой пробы',
//           'number' => '8',
//           'questions' => [
//               [
//                 'name' => 'a.	Положительная',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Пограничная',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Норма',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Проведено обследование согласно клиническим рекомендациям. Молекулярно–генетическое обследование: генотип CFTRdele2,3/(p.Glu92Lys, E92K.
// Действия?',
//           'number' => '9',
//           'questions' => [
//               [
//                 'name' => 'a.	Диагноз установлен',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Диагноз не установлен, нужна консультация генетика',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Диагноз установлен, но нужна консультация генетика',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Необходимо проверить результат анализа по генетическим базам',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Проведено обследование согласно клиническим рекомендациям. Панкреатическая эластаза кала от 02.11.2019 менее 50 мкг\г кала',
//           'number' => '10',
//           'questions' => [
//               [
//                 'name' => 'a.	норма более 200 мкг кала в 1 г',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	норма более 500 мкг кала в 1 г',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	норма более 100 мкг кала в 1 г',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'При каком уровне гликемии натощак можно поставить диагноз сахарный диабет?',
//           'number' => '11',
//           'questions' => [
//               [
//                 'name' => 'a.	Более 5,5 ммоль/л',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Более 7 ммоль/л',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Более 10 ммоль/л',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Более 11 ммоль/л',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Природа сахарного диабета?',
//           'number' => '12',
//           'questions' => [
//               [
//                 'name' => 'a.	Диабет на фоне хронического панкреатита',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Муковисцидоз-ассоциированный сахарный диабет',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Диабет 1 типа',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Диабет 2 типа ',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Терапия MRSA?',
//           'number' => '13',
//           'questions' => [
//               [
//                 'name' => 'a.	Лечить',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	Не лечить',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Наблюдаем в динамике',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//
//         [
//           'title' => 'Терапия?',
//           'number' => '14',
//           'questions' => [
//               [
//                 'name' => 'a.	Панкреатические ферменты',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'b.	ИПП',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'c.	Дротаверин',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'd.	Мебеверин',
//                 'counter' => '0',
//               ],
//               [
//                 'name' => 'e.	CFTR – модуляторы ',
//                 'counter' => '0',
//               ]
//           ]
//         ],
//   ];


private $demoTests = [
      [
        'title' => 'Что из перечисленного ниже лежит в основе БА?',
        'number' => '0',
        'questions' => [
            [
              'name' => 'a.	Хроническое воспаление стенки бронхов',
              'counter' => '0',
            ],
            [
              'name' => 'б.	Острое воспаление бронхов',
              'counter' => '0',
            ],
            [
              'name' => 'в.	Инфекционное воспаление',
              'counter' => '0',
            ],
            [
              'name' => 'г.	Нарушение нервной системы',
              'counter' => '0',
            ]
        ]
      ],

      [
        'title' => 'Какой метод доставки препарата имеет преимущества у детей раннего возраста?',
        'number' => '1',
        'questions' => [
            [
              'name' => 'а.	Небулайзер',
              'counter' => '0',
            ],
            [
              'name' => 'б.	Спейсер',
              'counter' => '0',
            ],
            [
              'name' => 'в.	Дозирующий аэрозольный ингалятор со спейсером',
              'counter' => '0',
            ],
            [
              'name' => 'г.	Дискхалер',
              'counter' => '0',
            ]
        ]
      ]
];

  public function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
  }

  public function Create()
  {
      $this->wpdb->get_results(
         "CREATE TABLE `" . $this->wpdb->prefix . "wppt_tests`
         (
         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(2048) NOT NULL,
		     title VARCHAR(2048) NOT NULL,
         questions VARCHAR(4096) NULL,
         number int(6) NULL,
		     counter int(6) NULL,
         UNIQUE KEY id (id)
         )"
      );

      $this->CreateTests();
  }

  public function CreateTests()
  {
      foreach ( $this->demoTests as $test )
      {
          $this->Add( $test['title'], $test['title'], serialize($test['questions']), $test['number'] ); //json_encode( $test['questions'], JSON_UNESCAPED_UNICODE )
      }
  }

  public function Drop()
  {
      $this->wpdb->get_results(
        "DROP TABLE `" . $this->wpdb->prefix . "wppt_tests`"
      );
  }

  public function Get( $name )
  {
    return $this->wpdb->get_results(
       "SELECT `name`, `title`, `questions`, `number`, `counter`
       FROM `" . $this->wpdb->prefix . "wppt_tests`
       WHERE `name` = '" . $name . "'",
       ARRAY_A
      )[0];
  }

  public function GetAll()
  {
    return $this->wpdb->get_results(
       "SELECT `name`, `title`, `questions`, `number`, `counter`
       FROM `" . $this->wpdb->prefix . "wppt_tests`",
       ARRAY_A
      );
  }

  public function Add( $name, $title, $questions, $number )
  {
    $this->wpdb->get_results(
      "INSERT INTO `" . $this->wpdb->prefix . "wppt_tests` (`name`, `title`, `questions`, `number`)
      VALUES ('" . $name . "', '" . $title . "', '" . $questions . "', '" . $number . "')"
    );
  }

  public function Update( $name, $title, $questions, $number )
  {
    $this->wpdb->get_results(
      "UPDATE `" . $this->wpdb->prefix . "wppt_tests` SET `title` = '" . $title . "', `questions` = '" . $questions . "', `number` = '" . $number . "' WHERE `name` = '" . $name . "'"
    );
  }

  public function UpdateCounter( $name, $count )
  {
    $this->wpdb->get_results(
      "UPDATE `" . $this->wpdb->prefix . "wppt_tests` SET `counter` = " . $count . " WHERE `name` = '" . $name . "'"
    );
  }

  public function Delete( $name )
  {
      $this->wpdb->get_results(
        "DELETE FROM `" . $this->wpdb->prefix . "wppt_tests` WHERE `name` = " . $name
      );
  }
}
