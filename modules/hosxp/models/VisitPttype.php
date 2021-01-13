<?php

namespace app\modules\hosxp\models;

use Yii;

/**
 * This is the model class for table "visit_pttype".
 *
 * @property string $vn
 * @property string $pttype
 * @property string|null $staff
 * @property float|null $rcpt_amount
 * @property float|null $debt_amount
 * @property float|null $discount_amount
 * @property string|null $begin_date
 * @property string|null $expire_date
 * @property string|null $hospmain
 * @property string|null $hospsub
 * @property string|null $pttypeno
 * @property int|null $pttype_number
 * @property int|null $pttype_order
 * @property float|null $discount_percent
 * @property int|null $company_id
 * @property int|null $contract_id
 * @property float|null $max_debt_amount
 * @property float|null $paid_amount
 * @property string|null $claim_code
 * @property string|null $hos_guid
 * @property int|null $limit_hour
 * @property string|null $check_limit_hour
 * @property string|null $finance_clear_ok
 * @property string|null $hos_guid_ext
 * @property string|null $confirm_and_locked_datetime
 * @property string|null $confirm_and_locked
 * @property string|null $confirm_and_locked_staff
 * @property string|null $nhso_govcode
 * @property string|null $nhso_govname
 * @property string|null $nhso_docno
 * @property string|null $nhso_ownright_pid
 * @property string|null $nhso_ownright_name
 * @property string|null $update_datetime
 * @property string|null $emp_privilege
 * @property int|null $emp_id
 * @property string|null $pttype_service_charge
 * @property string|null $pttype_note
 * @property string|null $auth_code
 * @property string|null $rcpno_list
 */
class VisitPttype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit_pttype';
    }
    
    
         public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vn', 'pttype'], 'required'],
            [['rcpt_amount', 'debt_amount', 'discount_amount', 'discount_percent', 'max_debt_amount', 'paid_amount'], 'number'],
            [['begin_date', 'expire_date', 'confirm_and_locked_datetime', 'update_datetime'], 'safe'],
            [['pttype_number', 'pttype_order', 'company_id', 'contract_id', 'limit_hour', 'emp_id'], 'integer'],
            [['pttype_note'], 'string'],
            [['vn', 'nhso_ownright_pid'], 'string', 'max' => 13],
            [['pttype'], 'string', 'max' => 2],
            [['staff'], 'string', 'max' => 15],
            [['hospmain', 'hospsub'], 'string', 'max' => 5],
            [['pttypeno'], 'string', 'max' => 50],
            [['claim_code'], 'string', 'max' => 25],
            [['hos_guid'], 'string', 'max' => 38],
            [['check_limit_hour', 'finance_clear_ok', 'confirm_and_locked', 'emp_privilege', 'pttype_service_charge'], 'string', 'max' => 1],
            [['hos_guid_ext'], 'string', 'max' => 64],
            [['confirm_and_locked_staff'], 'string', 'max' => 20],
            [['nhso_govcode'], 'string', 'max' => 10],
            [['nhso_govname'], 'string', 'max' => 200],
            [['nhso_docno'], 'string', 'max' => 30],
            [['nhso_ownright_name'], 'string', 'max' => 150],
            [['rcpno_list'], 'string', 'max' => 250],
            [['vn', 'pttype'], 'unique', 'targetAttribute' => ['vn', 'pttype']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vn' => 'Vn',
            'pttype' => 'Pttype',
            'staff' => 'Staff',
            'rcpt_amount' => 'Rcpt Amount',
            'debt_amount' => 'Debt Amount',
            'discount_amount' => 'Discount Amount',
            'begin_date' => 'Begin Date',
            'expire_date' => 'Expire Date',
            'hospmain' => 'Hospmain',
            'hospsub' => 'Hospsub',
            'pttypeno' => 'Pttypeno',
            'pttype_number' => 'Pttype Number',
            'pttype_order' => 'Pttype Order',
            'discount_percent' => 'Discount Percent',
            'company_id' => 'Company ID',
            'contract_id' => 'Contract ID',
            'max_debt_amount' => 'Max Debt Amount',
            'paid_amount' => 'Paid Amount',
            'claim_code' => 'Claim Code',
            'hos_guid' => 'Hos Guid',
            'limit_hour' => 'Limit Hour',
            'check_limit_hour' => 'Check Limit Hour',
            'finance_clear_ok' => 'Finance Clear Ok',
            'hos_guid_ext' => 'Hos Guid Ext',
            'confirm_and_locked_datetime' => 'Confirm And Locked Datetime',
            'confirm_and_locked' => 'Confirm And Locked',
            'confirm_and_locked_staff' => 'Confirm And Locked Staff',
            'nhso_govcode' => 'Nhso Govcode',
            'nhso_govname' => 'Nhso Govname',
            'nhso_docno' => 'Nhso Docno',
            'nhso_ownright_pid' => 'Nhso Ownright Pid',
            'nhso_ownright_name' => 'Nhso Ownright Name',
            'update_datetime' => 'Update Datetime',
            'emp_privilege' => 'Emp Privilege',
            'emp_id' => 'Emp ID',
            'pttype_service_charge' => 'Pttype Service Charge',
            'pttype_note' => 'Pttype Note',
            'auth_code' => 'Auth Code',
            'rcpno_list' => 'Rcpno List',
        ];
    }
}
