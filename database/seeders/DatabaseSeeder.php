<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ══════════════ الأقسام ══════════════
        $departments = [
            ['name' => 'Chirurgie Gynécologique',    'name_ar' => 'جراحة النساء والتوليد',   'code' => 'surgery_women',    'head_name' => 'د. سارة خليل',      'type' => 'surgery'],
            ['name' => 'Chirurgie Générale Hommes',  'name_ar' => 'جراحة الرجال',            'code' => 'surgery_men',      'head_name' => 'د. أحمد بن عمر',     'type' => 'surgery'],
            ['name' => 'Orthopédie',                 'name_ar' => 'جراحة العظام والمفاصل',   'code' => 'orthopedics',      'head_name' => 'د. كريم حسان',       'type' => 'surgery'],
            ['name' => 'Maternité',                  'name_ar' => 'الأمومة والطفولة',        'code' => 'maternity',        'head_name' => 'د. ليلى بوسلطان',    'type' => 'medical'],
            ['name' => 'Urgences',                   'name_ar' => 'قسم الطوارئ',             'code' => 'emergency',        'head_name' => 'د. نسرين حمدان',     'type' => 'medical'],
            ['name' => 'Laboratoire',                'name_ar' => 'التشخيص والمخبر',         'code' => 'laboratory',       'head_name' => 'د. فاطمة زروق',      'type' => 'support'],
            ['name' => 'Pharmacie',                  'name_ar' => 'الصيدلية',                'code' => 'pharmacy',         'head_name' => 'صيدلي. محمد العربي',  'type' => 'support'],
        ];

        foreach ($departments as $dept) {
            DB::table('departments')->insert(array_merge($dept, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ الأطباء ══════════════
        $doctors = [
            ['first_name' => 'سارة',   'last_name' => 'خليل',      'specialty' => 'جراحة النساء والتوليد',  'department_id' => 1, 'experience_years' => 15, 'grade' => 'Professeur'],
            ['first_name' => 'ليلى',   'last_name' => 'بوسلطان',    'specialty' => 'أمراض النساء والتوليد',   'department_id' => 1, 'experience_years' => 12, 'grade' => 'Maitre-assistant'],
            ['first_name' => 'أحمد',   'last_name' => 'بن عمر',     'specialty' => 'جراحة عامة',              'department_id' => 2, 'experience_years' => 18, 'grade' => 'Professeur'],
            ['first_name' => 'نسرين',  'last_name' => 'حمدان',      'specialty' => 'طب الطوارئ والإنعاش',     'department_id' => 5, 'experience_years' => 8,  'grade' => 'Maitre-assistant'],
            ['first_name' => 'كريم',   'last_name' => 'حسان',       'specialty' => 'جراحة العظام',            'department_id' => 3, 'experience_years' => 14, 'grade' => 'Professeur'],
            ['first_name' => 'منال',   'last_name' => 'بركات',      'specialty' => 'طب الأطفال',              'department_id' => 4, 'experience_years' => 10, 'grade' => 'Résident'],
        ];

        foreach ($doctors as $doc) {
            DB::table('doctors')->insert(array_merge($doc, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ المرضى ══════════════
        $patients = [
            ['first_name' => 'فاطمة',   'last_name' => 'بن عمر',     'gender' => 'female', 'blood_type' => 'A+',  'department_id' => 1, 'room' => 'غرفة 1', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-04-01'],
            ['first_name' => 'نور الهدى','last_name' => 'مولاي',      'gender' => 'female', 'blood_type' => 'B+',  'department_id' => 1, 'room' => 'غرفة 2', 'bed' => '2',  'status' => 'hospitalized', 'admission_date' => '2026-04-02'],
            ['first_name' => 'حفيظة',   'last_name' => 'زروق',       'gender' => 'female', 'blood_type' => 'O+',  'department_id' => 1, 'room' => 'غرفة 1', 'bed' => '3',  'status' => 'hospitalized', 'admission_date' => '2026-03-28'],
            ['first_name' => 'أمال',    'last_name' => 'بركات',      'gender' => 'female', 'blood_type' => 'AB+', 'department_id' => 1, 'room' => 'غرفة 3', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-04-03'],
            ['first_name' => 'زهرة',    'last_name' => 'مولاي',      'gender' => 'female', 'blood_type' => 'A-',  'department_id' => 4, 'room' => 'غرفة 2', 'bed' => '2',  'status' => 'hospitalized', 'admission_date' => '2026-04-01'],
            ['first_name' => 'خديجة',   'last_name' => 'محمد',       'gender' => 'female', 'blood_type' => 'O-',  'department_id' => 1, 'room' => 'غرفة 4', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-03-30'],
            ['first_name' => 'محمد',    'last_name' => 'بوعزيز',     'gender' => 'male',   'blood_type' => 'B+',  'department_id' => 2, 'room' => 'غرفة 1', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-04-01'],
            ['first_name' => 'عبد الله', 'last_name' => 'خليفة',     'gender' => 'male',   'blood_type' => 'A+',  'department_id' => 2, 'room' => 'غرفة 2', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-04-02'],
            ['first_name' => 'يوسف',    'last_name' => 'حداد',       'gender' => 'male',   'blood_type' => 'O+',  'department_id' => 3, 'room' => 'غرفة 1', 'bed' => '2',  'status' => 'hospitalized', 'admission_date' => '2026-03-29'],
            ['first_name' => 'سمية',    'last_name' => 'بن ناصر',    'gender' => 'female', 'blood_type' => 'A+',  'department_id' => 4, 'room' => 'غرفة 1', 'bed' => '1',  'status' => 'hospitalized', 'admission_date' => '2026-04-03'],
        ];

        foreach ($patients as $pat) {
            DB::table('patients')->insert(array_merge($pat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ العمليات الجراحية ══════════════
        $surgeries = [
            ['patient_name' => 'فاطمة بن عمر',     'doctor_name' => 'د. سارة خليل',    'surgery_date' => '2026-04-05', 'room' => 'غرفة عمليات 1', 'department_id' => 1, 'patient_id' => 1, 'status' => 'scheduled', 'surgery_time' => '08:00:00'],
            ['patient_name' => 'نور الهدى مولاي',   'doctor_name' => 'د. ليلى بوسلطان',  'surgery_date' => '2026-04-05', 'room' => 'غرفة عمليات 2', 'department_id' => 1, 'patient_id' => 2, 'status' => 'scheduled', 'surgery_time' => '10:00:00'],
            ['patient_name' => 'محمد بوعزيز',       'doctor_name' => 'د. أحمد بن عمر',   'surgery_date' => '2026-04-06', 'room' => 'غرفة عمليات 1', 'department_id' => 2, 'patient_id' => 7, 'status' => 'scheduled', 'surgery_time' => '09:00:00'],
            ['patient_name' => 'يوسف حداد',         'doctor_name' => 'د. كريم حسان',     'surgery_date' => '2026-04-04', 'room' => 'غرفة عمليات 3', 'department_id' => 3, 'patient_id' => 9, 'status' => 'completed', 'surgery_time' => '14:00:00'],
            ['patient_name' => 'حفيظة زروق',        'doctor_name' => 'د. سارة خليل',    'surgery_date' => '2026-04-03', 'room' => 'غرفة عمليات 1', 'department_id' => 1, 'patient_id' => 3, 'status' => 'completed', 'surgery_time' => '11:00:00'],
        ];

        foreach ($surgeries as $surg) {
            DB::table('surgeries')->insert(array_merge($surg, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ الأدوية ══════════════
        $medications = [
            ['name' => 'Paracetamol',   'name_ar' => 'باراسيتامول',      'category' => 'مسكنات',            'dosage_form' => 'قارورة وريدية',     'strength' => '1g',     'stock_quantity' => 200],
            ['name' => 'Amoxicillin',   'name_ar' => 'أموكسيسيلين',       'category' => 'مضادات حيوية',      'dosage_form' => 'قرص',               'strength' => '500mg',  'stock_quantity' => 150],
            ['name' => 'Tramadol',      'name_ar' => 'ترامادول',          'category' => 'مسكنات',            'dosage_form' => 'أمبولة',            'strength' => '50mg',   'stock_quantity' => 80],
            ['name' => 'Ceftriaxone',   'name_ar' => 'سيفترياكسون',       'category' => 'مضادات حيوية',      'dosage_form' => 'حقنة وريدية',       'strength' => '1g',     'stock_quantity' => 100],
            ['name' => 'Enoxaparin',    'name_ar' => 'إينوكسابارين',      'category' => 'مضادات التخثر',     'dosage_form' => 'حقنة تحت الجلد',    'strength' => '4000UI', 'stock_quantity' => 60],
            ['name' => 'Diclofenac',    'name_ar' => 'ديكلوفيناك',        'category' => 'مسكنات',            'dosage_form' => 'أمبولة عضلية',      'strength' => '75mg',   'stock_quantity' => 120],
            ['name' => 'Metronidazole', 'name_ar' => 'ميترونيدازول',      'category' => 'مضادات حيوية',      'dosage_form' => 'قارورة وريدية',     'strength' => '500mg',  'stock_quantity' => 90],
            ['name' => 'Omeprazole',    'name_ar' => 'أوميبرازول',        'category' => 'أدوية الجهاز الهضمي','dosage_form' => 'قرص',              'strength' => '20mg',   'stock_quantity' => 180],
        ];

        foreach ($medications as $med) {
            DB::table('medications')->insert(array_merge($med, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ سجل الأدوية ══════════════
        $medLogs = [
            ['patient_id' => 1, 'medication_id' => 1, 'department_id' => 1, 'nurse_name' => 'سارة خليل',        'dose' => '1 قارورة وريدية',      'route' => 'IV',   'administered_at' => '2026-04-04 08:00:00'],
            ['patient_id' => 2, 'medication_id' => 2, 'department_id' => 1, 'nurse_name' => 'ليلى بوسلطان',      'dose' => '2 حبة',                'route' => 'oral', 'administered_at' => '2026-04-04 10:30:00'],
            ['patient_id' => 3, 'medication_id' => 3, 'department_id' => 1, 'nurse_name' => 'نسرين أيت علي',     'dose' => '1 أمبولة',             'route' => 'IM',   'administered_at' => '2026-04-04 12:15:00'],
            ['patient_id' => 4, 'medication_id' => 4, 'department_id' => 1, 'nurse_name' => 'إيمان بلحوت',       'dose' => '1 حقنة (IV)',          'route' => 'IV',   'administered_at' => '2026-04-04 16:00:00'],
            ['patient_id' => 5, 'medication_id' => 5, 'department_id' => 4, 'nurse_name' => 'سارة خليل',         'dose' => '1 حقنة تحت الجلد',    'route' => 'SC',   'administered_at' => '2026-04-04 18:00:00'],
            ['patient_id' => 6, 'medication_id' => 6, 'department_id' => 1, 'nurse_name' => 'ليلى بوسلطان',      'dose' => '1 أمبولة (IM)',        'route' => 'IM',   'administered_at' => '2026-04-04 20:00:00'],
        ];

        foreach ($medLogs as $log) {
            DB::table('medication_logs')->insert(array_merge($log, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ المواعيد ══════════════
        $appointments = [
            ['patient_id' => 1, 'doctor_id' => 1, 'department_id' => 1, 'appointment_date' => '2026-04-05', 'appointment_time' => '08:00:00', 'status' => 'confirmed', 'reason' => 'متابعة ما بعد العملية'],
            ['patient_id' => 2, 'doctor_id' => 2, 'department_id' => 1, 'appointment_date' => '2026-04-06', 'appointment_time' => '09:30:00', 'status' => 'pending',   'reason' => 'فحص روتيني'],
            ['patient_id' => 7, 'doctor_id' => 3, 'department_id' => 2, 'appointment_date' => '2026-04-07', 'appointment_time' => '10:00:00', 'status' => 'pending',   'reason' => 'استشارة جراحية'],
            ['patient_id' => 9, 'doctor_id' => 5, 'department_id' => 3, 'appointment_date' => '2026-04-08', 'appointment_time' => '14:00:00', 'status' => 'confirmed', 'reason' => 'متابعة كسر'],
            ['patient_id' => 10,'doctor_id' => 6, 'department_id' => 4, 'appointment_date' => '2026-04-05', 'appointment_time' => '11:00:00', 'status' => 'pending',   'reason' => 'فحص حمل'],
        ];

        foreach ($appointments as $appt) {
            DB::table('appointments')->insert(array_merge($appt, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ══════════════ طلبات العمليات ══════════════
        $demands = [
            ['patient_name' => 'آمنة بلقاسم',    'surgery_type' => 'استئصال الزائدة الدودية',    'description' => 'ألم شديد في البطن منذ 3 أيام',             'requested_date' => '2026-04-10', 'status' => 'pending'],
            ['patient_name' => 'رشيد مرابط',      'surgery_type' => 'جراحة الفتق',                'description' => 'فتق إربي أيمن، يحتاج تدخل جراحي',          'requested_date' => '2026-04-12', 'status' => 'approved'],
            ['patient_name' => 'سعاد حميداني',    'surgery_type' => 'عملية قيصرية',               'description' => 'حامل في الشهر التاسع، وضعية الجنين مقلوبة', 'requested_date' => '2026-04-08', 'status' => 'scheduled'],
        ];

        foreach ($demands as $dem) {
            DB::table('demands')->insert(array_merge($dem, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
