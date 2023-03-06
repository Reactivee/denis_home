<?php
namespace common\service;

use common\models\Complexes;
use common\models\ComplexInfrastructure;
use common\models\ComplexOptions;
use common\models\ComplexTags;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ComplexService
{

    //TAGS

    public static function saveTags(Complexes $complex)
    {
        if (!empty($complex->tag_ids))
        {
            foreach ($complex->tag_ids as $val)
            {
                $complexTag = new ComplexTags();
                $complexTag->complex_id = $complex->id;
                $complexTag->tag_id = $val;
                $complexTag->save();
            }
        }

    }

    public static function updateTagIds(Complexes $complex)
    {
        $complexTags = ComplexTags::find()
            ->where([
                'complex_id' => $complex->id
            ])->asArray()->all();
        $old_ids = ArrayHelper::map($complexTags,'tag_id','tag_id');
        $old_diff = array_diff($old_ids,$complex->tag_ids);
        if (!empty($old_diff))
        {
            foreach ($old_diff as $k_old => $v_old)
            {
                $old_tag = ComplexTags::findOne([
                    'complex_id' => $complex->id,
                    'tag_id' => $v_old
                ]);
                if ($old_tag != null)
                    $old_tag->delete();
                else
                    continue;
            }
        }

        $new_diff = array_diff($complex->tag_ids,$old_ids);
        if (!empty($new_diff))
        {
            foreach ($new_diff as $k_new => $v_new)
            {
                $complexTag = new ComplexTags();
                $complexTag->complex_id = $complex->id;
                $complexTag->tag_id = $v_new;
                $complexTag->save();
            }
        }
    }


    //Infrastructures

    public static function saveInfrastructures(Complexes $complex)
    {
        if (!empty($complex->infrastructure_ids))
        {
            foreach ($complex->infrastructure_ids as $val)
            {
                $complexTag = new ComplexInfrastructure();
                $complexTag->complex_id = $complex->id;
                $complexTag->infrastructure_id = $val;
                $complexTag->save();
            }
        }

    }

    public static function updateInfrastructures(Complexes $complex)
    {
        $complexInfrastructures = ComplexInfrastructure::find()
            ->where([
                'complex_id' => $complex->id
            ])->asArray()->all();
        $old_ids = ArrayHelper::map($complexInfrastructures,'infrastructure_id','infrastructure_id');
        $old_diff = array_diff($old_ids,$complex->infrastructure_ids);
        if (!empty($old_diff))
        {
            foreach ($old_diff as $k_old => $v_old)
            {
                $old_infrastructure = ComplexInfrastructure::findOne([
                    'complex_id' => $complex->id,
                    'infrastructure_id' => $v_old
                ]);
                if ($old_infrastructure != null)
                    $old_infrastructure->delete();
                else
                    continue;
            }
        }

        $new_diff = array_diff($complex->infrastructure_ids,$old_ids);
        if (!empty($new_diff))
        {
            foreach ($new_diff as $k_new => $v_new)
            {
                $complexTag = new ComplexInfrastructure();
                $complexTag->complex_id = $complex->id;
                $complexTag->infrastructure_id = $v_new;
                $complexTag->save();
            }
        }
    }




    public static function saveOptions(Complexes $complex)
    {
        if (!empty($complex->options))
        {
            foreach ($complex->options as $key => $value)
            {
                $complex_option = new ComplexOptions();
                $complex_option->complex_id = $complex->id;
                $complex_option->option_id = (int)$key;
                $complex_option->value_id = (int)$value;
                $complex_option->save();
            }
        }
    }

    public static function updateOptions(Complexes $complex)
    {
        if (!empty($complex->options))
        {
            foreach ($complex->options as $key => $value)
            {
                /** @var ComplexOptions $complex_option */
                $complex_option = ComplexOptions::find()
                    ->where([
                        'complex_id' => $complex->id,
                        'option_id' => $key
                    ])->one();
                if ($complex_option != null)
                {
                    $complex_option->value_id = $value;
                    $complex_option->save();
                }
                else
                {
                    $complex_option = new ComplexOptions();
                    $complex_option->complex_id = $complex->id;
                    $complex_option->option_id = (int)$key;
                    $complex_option->value_id = (int)$value;
                    $complex_option->save();
                }
            }
        }
    }
}