<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentMaster;

/**
 * StudentMasterSearch represents the model behind the search form of `app\models\StudentMaster`.
 */
class StudentMasterSearch extends StudentMaster
{
    public $search;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Roll_no', 'Enroll_no', 'Course', 'Sem', 'Exam_type', 'Student_type', 'Gender', 'DOB', 'Sub1', 'Sub2', 'Sub3', 'Sub4', 'Sub5', 'Phone_no', 'Address', 'Created_at', 'Updated_at'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = StudentMaster::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if (!empty($this->search)) {
            $query->andFilterWhere([
                'or',
                ['like', 'Roll_no', $this->search],
                ['like', 'Enroll_no', $this->search],
                ['like', 'Course', $this->search],
                ['like', 'Sem', $this->search],
                ['like', 'Exam_type', $this->search],
                ['like', 'Student_type', $this->search],
                ['like', 'Gender', $this->search],
                ['like', 'DOB', $this->search],
                ['like', 'Sub1', $this->search],
                ['like', 'Sub2', $this->search],
                ['like', 'Sub3', $this->search],
                ['like', 'Sub4', $this->search],
                ['like', 'Sub5', $this->search],
                ['like', 'Phone_no', $this->search],
                ['like', 'Address', $this->search],
            ]);
        }

        return $dataProvider;
    }

}
