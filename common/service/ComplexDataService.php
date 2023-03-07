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

    public static function complexViewData($id)
    {
        $complex = Complexes::findOne($id);
    }

}