<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * KEY : MULTIPERMISSION
     */
    public function run(): void
    {
        $complaints = [
            'Fever',
            'Shortness of Breath',
            'Vomiting',
            'Nausea',
            'Fatigue',
            'Headache',
            'Chest Burn',
            'Nerve Pain',
            'Lymph Nodes',
            'Blurry Vision',
            'Eye Pain',
            'Watery Eyes',
            'Excessive Sweating',
            'Joint Pain',
            'Anxiety',
            'Yellowish',
            'Anguish',
            'Constipation',
            'Loose Motion',
            'Excess Bleeding',
            'Blocked Nose',
            'Bloody Cough',
            'Secretion',
            'Excessive Thirst',
            'Swelling',
            'Numbness',
            'Dizziness',
            'High Blood Pressure',
            'Low Blood Pressure',
            'High Blood Sugar',
            'Low Blood Sugar',
            'Sleeplessness',
            'Anemia',
            'Difficulty to Stand',
            'Difficulty to Sit/Lay',
            'Difficulty to Talk',
            'Depression',
            'Suicidal',
            'Imaginary Entity',
            'Urinary Difficulty',
            'Dry Cough',
            'Mucas Cough',
            'Cyst',
            'Bloody Urine'
        ];

        foreach ($complaints as $complaint) {
            DB::table('complaints')->insert([
                'name' => $complaint,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /**
         * 
         * 
         * 
         */

         $tests = [
            ['test_name' => 'CBC  (Complete Blood Count)'],
            ['test_name' => 'LP (Lipid Panel/Profile)'],
            ['test_name' => 'RBS (Random Blood Sugar - Fasting)'],
            ['test_name' => 'TFT/ (Thyroid Function Test)'],
            ['test_name' => 'S-Cretanine (Kidney/Renal Function Test)'],
            ['test_name' => 'Urine Examination'],
            ['test_name' => 'X-Ray (Radiology)'],
            ['test_name' => 'MRI (Magnetic Resonance Imaging)'],
            ['test_name' => 'CT (Computed Tomography)'],
            ['test_name' => 'Genetic Testing'],
            ['test_name' => 'Stool Examination'],
            ['test_name' => 'Dermatology'],
            ['test_name' => 'Sperm Count Test (Potency Test)'],
            ['test_name' => 'ECG (Eco Cardiogram)'],
            ['test_name' => 'EGG (ElectroGastrogram)'],
            ['test_name' => 'Functionality Test'],
            ['test_name' => 'Physiotherapy'],
            ['test_name' => 'Audiotherapy'],
            ['test_name' => 'Covid-19 (Antigen)'],
            ['test_name' => 'Covid-19 (RT-PCR)'],
            ['test_name' => 'HIV Screening'],
            ['test_name' => 'HPV Screening'],
            ['test_name' => 'HbA'],
            ['test_name' => 'HbAg+'],
            ['test_name' => 'HbC'],
            ['test_name' => 'USG-A'],
            ['test_name' => 'USG-C'],
            ['test_name' => 'H1N1'],
            ['test_name' => 'ETT (Exercise Tolerance Test)'],
            ['test_name' => 'Angiogram'],
            ['test_name' => 'Mammography'],
            ['test_name' => 'Urography'],
            ['test_name' => 'PFT (Pulmonary Function Test)'],
            ['test_name' => 'MRS (Magnetic Resonance Spectography)'],
            ['test_name' => 'Prenatal/Pregnancy Test'],
            ['test_name' => 'Endoscopy'],
            ['test_name' => 'Cerebral Angiography'],
        ];

        DB::table('mast_tests')->insert($tests);


        /**
         * 
         * 
         * 
         */

         $organs = [
            ['organ_name' => 'Scalp'],
            ['organ_name' => 'Brain'],
            ['organ_name' => 'Forehead'],
            ['organ_name' => 'Eye (right)'],
            ['organ_name' => 'Eye (left)'],
            ['organ_name' => 'Nostril'],
            ['organ_name' => 'Ear (Right)'],
            ['organ_name' => 'Ear (Left)'],
            ['organ_name' => 'Lip (Upper)'],
            ['organ_name' => 'Lip (Lower)'],
            ['organ_name' => 'Tongue'],
            ['organ_name' => 'Tonsils'],
            ['organ_name' => 'Trachea/Airway'],
            ['organ_name' => 'Heart'],
            ['organ_name' => 'Lung (Right)'],
            ['organ_name' => 'Lung (Left)'],
            ['organ_name' => 'Intestine (Large)'],
            ['organ_name' => 'Intestine (Small)'],
            ['organ_name' => 'Kidney (Right)'],
            ['organ_name' => 'Kidney (Left)'],
            ['organ_name' => 'Thyroid Gland'],
            ['organ_name' => 'Appendix'],
            ['organ_name' => 'Bladder'],
            ['organ_name' => 'Pancreas'],
            ['organ_name' => 'Endocrine Systems'],
            ['organ_name' => 'Lymphatic'],
            ['organ_name' => 'Nerve/Nervous System'],
            ['organ_name' => 'Skeletal'],
            ['organ_name' => 'Anal'],
            ['organ_name' => 'Esophagus'],
            ['organ_name' => 'Penis'],
            ['organ_name' => 'Navel'],
            ['organ_name' => 'Vagina'],
            ['organ_name' => 'Hip Joint'],
            ['organ_name' => 'Anus'],
            ['organ_name' => 'Nails'],
            ['organ_name' => 'Skin'],
            ['organ_name' => 'Bone'],
            ['organ_name' => 'Hair'],
            ['organ_name' => 'Thigh (Upper)'],
            ['organ_name' => 'Thigh (Lower)'],
            ['organ_name' => 'Knee'],
            ['organ_name' => 'Buttocks'],
            ['organ_name' => 'Toe'],
            ['organ_name' => 'Finger(s) (Right Hand)'],
            ['organ_name' => 'Finger(s) (Left Hand)'],
            ['organ_name' => 'Finger(s) (Right Toe)'],
            ['organ_name' => 'Finger(s) (Left Toe)'],
            ['organ_name' => 'Ovary (Right)'],
            ['organ_name' => 'Ovary (Left)'],
            ['organ_name' => 'Breast (Right)'],
            ['organ_name' => 'Breast (Left)'],
            ['organ_name' => 'Testicle (Right)'],
            ['organ_name' => 'Testicle (Left)'],
        ];

        DB::table('mast_organs')->insert($organs);
    }
}
