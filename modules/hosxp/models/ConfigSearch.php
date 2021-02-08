<?php

namespace app\modules\hosxp\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hosxp\models\Config;

/**
 * ConfigSearch represents the model behind the search form of `app\modules\hosxp\models\Config`.
 */
class ConfigSearch extends Config
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hospcode', 'befor_byear', 'byear', 'chwpart', 'amppart','thbyear'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Config::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'befor_byear' => $this->befor_byear,
            'byear' => $this->byear,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'chwpart', $this->chwpart])
            ->andFilterWhere(['like', 'amppart', $this->amppart]);

        return $dataProvider;
    }
}
