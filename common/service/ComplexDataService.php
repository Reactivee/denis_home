<?php
namespace common\service;

use common\models\ApartmentImages;
use common\models\Apartments;
use common\models\Complexes;
use common\models\ComplexImages;
use common\models\ComplexInfrastructure;
use common\models\ComplexOptions;
use common\models\ComplexTags;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ComplexDataService
{

    public $complex;
    public $apartments;
    public $options;
    public function __construct($id)
    {
        $complex = Complexes::find()
            ->with(['complexImages','tags','complexImages','infrastructures','city','region'])
            ->where([
                'id' => $id
            ])->asArray()->one();
        $this->complex = $complex;
        $this->getApartments();
        $this->getOptions();
    }

    public function getApartments()
    {
        $return = [];
        $apartments_group_by_query = "SELECT complex_id,MIN(area) as min_area,MAX(area) as max_area,MIN(price) as min_price,count_rooms FROM apartments WHERE complex_id={$this->complex['id']} GROUP BY count_rooms ORDER BY count_rooms";
        $group_by_data = Yii::$app->db->createCommand($apartments_group_by_query)->queryAll();
        if (!empty($group_by_data))
        {
            foreach ($group_by_data  as $key => $value)
            {
                $item = Apartments::find()
                    ->with('apartmentImages')
                    ->where([
                        'complex_id' => $this->complex['id'],
                        'count_rooms' => $value['count_rooms']
                    ])->orderBy([
                        'area' => SORT_ASC,
                        'price' => SORT_ASC,
                    ])->asArray()->all();
                if (!empty($item)) {
                    $value['apartments'] = $item;
                    $return[]= $value;
                }
            }
        }
        $this->apartments = $return;
    }

    public function getOptions()
    {
        $options_query = "SELECT `options`.title_tr,`options`.title_ru,`options`.title_en,option_values.value_tr,option_values.value_ru,option_values.value_en,`options`.icon FROM complex_options 
	JOIN `options` ON complex_options.option_id = `options`.id
	JOIN option_values ON complex_options.value_id = option_values.id
	WHERE complex_options.complex_id={$this->complex['id']}
	ORDER BY `options`.weight";

       $this->options =  Yii::$app->db->createCommand($options_query)->queryAll();
    }


}