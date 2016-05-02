<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use \App\Modules\Items\Controllers\ItemsController;

class ImportItems extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'import-items';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	//Run command
	//php artisan import-items
	public function fire()
	{
		//
		//echo 'anand';die;
        //American
        //$categories = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        //European
        //$categories = array('mercedes','bmw','rangerover','volvowagon','jaguar','porsche','audi','peugeot','skoda','mini','renault','volvo');

        //Asian
        //$categories = array('toyota','nissan','lexus','infiniti','honda','hyundai','kia','mitsubishi','suzuki','mazda','isuza','subaru','sheri');

        //Delivery
        //$categories = array('delivery');

		//Help in road
		//$categories = array('tareeqalabdali','tareeqalkabad','tareeqalsabeeh','tareeqalsalmi','alasmah','alfarwaniya','aljahra','tareeqalwafratwaalnuwaisib','alahmadi','fanimotanqal','hauli','mubarakalkabeer');

		//Technical Inspection
		//$categories = array('technicalinspection');

		//Taxi and movable wash
		//$categories = array('movablewash','taxi');

		//talsywahamayatwatajlil
		//$categories = array('talsywahamayatwatajlil');


		//Garage
		//$categories = array('awadamwaradeetarat','barmajatsayaraat','breakmizanwaheena','hydraulics','itaraat','jerat','katagyaar','kharbaawatakeef','makhrth','mechanic','shabagwahadada','shaftsadmat','tadeelranjat','taleemayaadin','tanjeed','zajaj','zeenatsayaratmasjalat');


		//General Services
		//$categories = array('tankad','taleemqayadat','nakalafsh','kafalshayarat','hadadatwamajlat','alshahnalbari','nasaaf','darkatar','crane');
		//$categories = array('nasaaf','darkatar','crane');

		//$categories = array('fiberglassandsmithy', 'mobilemechanicselectricity','freelycenters');

		/*$categories = array();
        $itemCont = new ItemsController();

        foreach($categories as $category){

            $itemCont->getImport($category);
        }*/

		//Get all categories
		//\Category::list();



		return;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
//	protected function getArguments()
//	{
//		return array(
//			array('example', InputArgument::REQUIRED, 'An example argument.'),
//		);
//	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
//	protected function getOptions()
//	{
//		return array(
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
//		);
//	}

}
