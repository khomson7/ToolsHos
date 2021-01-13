<?php

namespace app\modules\hosxp\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hosxp\models\VisitPttype;

/**
 * VisitPttypeSearch represents the model behind the search form of `app\modules\hosxp\models\VisitPttype`.
 */
class VisitPttypeSearch extends VisitPttype
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vn', 'pttype', 'staff', 'begin_date', 'expire_date', 'hospmain', 'hospsub', 'pttypeno', 'claim_code', 'hos_guid', 'check_limit_hour', 'finance_clear_ok', 'hos_guid_ext', 'confirm_and_locked_datetime', 'confirm_and_locked', 'confirm_and_locked_staff', 'nhso_govcode', 'nhso_govname', 'nhso_docno', 'nhso_ownright_pid', 'nhso_ownright_name', 'update_datetime', 'emp_privilege', 'pttype_service_charge', 'pttype_note',  'rcpno_list'], 'safe'],
            [['rcpt_amount', 'debt_amount', 'discount_amount', 'discount_percent', 'max_debt_amount', 'paid_amount'], 'number'],
            [['pttype_number', 'pttype_order', 'company_id', 'contract_id', 'limit_hour', 'emp_id'], 'integer'],
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
        $query = VisitPttype::find();

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
            'rcpt_amount' => $this->rcpt_amount,
            'debt_amount' => $this->debt_amount,
            'discount_amount' => $this->discount_amount,
            'begin_date' => $this->begin_date,
            'expire_date' => $this->expire_date,
            'pttype_number' => $this->pttype_number,
            'pttype_order' => $this->pttype_order,
            'discount_percent' => $this->discount_percent,
            'company_id' => $this->company_id,
            'contract_id' => $this->contract_id,
            'max_debt_amount' => $this->max_debt_amount,
            'paid_amount' => $this->paid_amount,
            'limit_hour' => $this->limit_hour,
            'confirm_and_locked_datetime' => $this->confirm_and_locked_datetime,
            'update_datetime' => $this->update_datetime,
            'emp_id' => $this->emp_id,
        ]);

        $query->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'pttype', $this->pttype])
            ->andFilterWhere(['like', 'staff', $this->staff])
            ->andFilterWhere(['like', 'hospmain', $this->hospmain])
            ->andFilterWhere(['like', 'hospsub', $this->hospsub])
            ->andFilterWhere(['like', 'pttypeno', $this->pttypeno])
            ->andFilterWhere(['like', 'claim_code', $this->claim_code])
            ->andFilterWhere(['like', 'hos_guid', $this->hos_guid])
            ->andFilterWhere(['like', 'check_limit_hour', $this->check_limit_hour])
            ->andFilterWhere(['like', 'finance_clear_ok', $this->finance_clear_ok])
            ->andFilterWhere(['like', 'hos_guid_ext', $this->hos_guid_ext])
            ->andFilterWhere(['like', 'confirm_and_locked', $this->confirm_and_locked])
            ->andFilterWhere(['like', 'confirm_and_locked_staff', $this->confirm_and_locked_staff])
            ->andFilterWhere(['like', 'nhso_govcode', $this->nhso_govcode])
            ->andFilterWhere(['like', 'nhso_govname', $this->nhso_govname])
            ->andFilterWhere(['like', 'nhso_docno', $this->nhso_docno])
            ->andFilterWhere(['like', 'nhso_ownright_pid', $this->nhso_ownright_pid])
            ->andFilterWhere(['like', 'nhso_ownright_name', $this->nhso_ownright_name])
            ->andFilterWhere(['like', 'emp_privilege', $this->emp_privilege])
            ->andFilterWhere(['like', 'pttype_service_charge', $this->pttype_service_charge])
            ->andFilterWhere(['like', 'pttype_note', $this->pttype_note])
           // ->andFilterWhere(['like', 'auth_code', $this->auth_code])
            ->andFilterWhere(['like', 'rcpno_list', $this->rcpno_list]);

        return $dataProvider;
    }
}
