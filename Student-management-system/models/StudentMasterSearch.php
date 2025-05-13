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
    public $globalSearch;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Roll_no', 'Enroll_no', 'Course', 'Sem', 'Exam_type', 'Student_type', 'Gender', 'DOB', 'Sub1', 'Sub2', 'Sub3', 'Sub4', 'Sub5', 'Phone_no', 'Address', 'Created_at', 'Updated_at', 'globalSearch'], 'safe'],
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
    public function search($params, $formName = null)
    {
        $query = StudentMaster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (!empty($this->DOB)) {
            $query->andFilterWhere(['DOB' => $this->DOB]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'DOB' => $this->DOB,
            'Gender' => $this->Gender,
            'Created_at' => $this->Created_at,
            'Updated_at' => $this->Updated_at,
        ]);
        if (!empty($this->globalSearch)) {
            $query->orFilterWhere(['like', 'Cd_name', $this->globalSearch])
                ->orFilterWhere(['like', 'Enroll_no', $this->globalSearch])
                ->orFilterWhere(['like', 'Course', $this->globalSearch])
                ->orFilterWhere(['like', 'Sem', $this->globalSearch])
                ->orFilterWhere(['like', 'Exam_type', $this->globalSearch])
                ->orFilterWhere(['like', 'Student_type', $this->globalSearch]);
        } else {
            $query->andFilterWhere(['like', 'Roll_no', $this->Roll_no])
                ->andFilterWhere(['like', 'Enroll_no', $this->Enroll_no])
                ->andFilterWhere(['like', 'Course', $this->Course])
                ->andFilterWhere(['like', 'Sem', $this->Sem])
                ->andFilterWhere(['like', 'Exam_type', $this->Exam_type])
                ->andFilterWhere(['like', 'Student_type', $this->Student_type])
                // ->andFilterWhere(['like', 'Gender', $this->Gender])
                ->andFilterWhere(['like', 'Sub1', $this->Sub1])
                ->andFilterWhere(['like', 'Sub2', $this->Sub2])
                ->andFilterWhere(['like', 'Sub3', $this->Sub3])
                ->andFilterWhere(['like', 'Sub4', $this->Sub4])
                ->andFilterWhere(['like', 'Sub5', $this->Sub5])
                ->andFilterWhere(['like', 'Phone_no', $this->Phone_no])
                ->andFilterWhere(['like', 'Address', $this->Address]);
        }
        return $dataProvider;
    }
}
