<?php
/**
 * @package wp-presentation-tests
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
 */
namespace wppt;
use wppt\Admin\SettingsPage;
use wppt\DB\DataBase;
use WP_REST_Request;

class Main
{
    private $session;
    private $tests;
    private $modelTests;
    private $database;
    private $currentTestNumber = 0;
    private $currentTest;

    public function __construct()
    {
        session_start();
        $_SESSION['session_key'] = session_id();
        $this->session = $_SESSION['session_key'];
        $this->database = new DataBase;
        $this->modelTests = $this->database->tables['tests'];
        $this->tests = $this->modelTests->GetAll();
        $this->currentTestNumber = empty( $_GET['wppt_question'] ) ? 0 : ( int )$_GET['wppt_question'];
        $this->currentTestNumber = $this->currentTestNumber > count($this->tests) ? count($this->tests) - 1 : $this->currentTestNumber;

        foreach ($this->tests as $test)
        {
            if( (int)$test['number'] == $this->currentTestNumber )
            {
              $this->currentTest = $test;
              break;
            }
        }

        new SettingsPage;
        $this->answer();
        $this->scriptAdd();
        $this->testsShortcode();
        $this->resultsShortcode();
    }

    private function scriptAdd()
    {
        wp_enqueue_style( 'wppt-styles', plugins_url('wp-presentation-tests/Source/Assets/Styles.css') );

        add_action('wp_enqueue_scripts', function()
        {
            wp_enqueue_script(
                'wppt-scripts',
                plugins_url('wp-presentation-tests/Source/Assets/Scripts.js'),
                [],
                '1.0.0'
            );
        });
    }

    private function testsShortcode()
    {
        add_shortcode('wppt-tests', function($atts, $content)
        {
			      ob_start();
            include  __DIR__ . '/Templates/Test.php';
            return ob_get_clean();

            return '';
        });
    }

    private function resultsShortcode()
    {
        add_shortcode('wppt-results', function($atts, $content)
        {
            $atts = shortcode_atts([
                'url' => '',
            ], $atts);

			      ob_start();
            include  __DIR__ . '/Templates/Results.php';
            return ob_get_clean();

            return;
        });
    }

    private function answer()
    {
        add_action( 'plugins_loaded', function()
        {
            if( isset( $_POST[ 'wppt-test-submit' ] ) )
            {
                 $questions = unserialize( $this->currentTest['questions'] );
                 $number = 0;

                 for( $i = 0; $i < count( $questions ); $i++ )
                 {
                      if( $_POST['wppt-question-' . $number] == 'select' )
                        $questions[$i]['counter'] = ( (int)$questions[$i]['counter'] + 1 );

                      $number++;
                 }

                 $this->modelTests->Update( $this->currentTest['name'], $this->currentTest['title'], serialize( $questions ), $this->currentTest['number'] );
                 $_SESSION['questions'] .= ';q' . $this->currentTestNumber;
                 $this->tests = $this->modelTests->GetAll();
            }
        } );
    }
}
