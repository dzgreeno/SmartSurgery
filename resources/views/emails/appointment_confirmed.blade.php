<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تأكيد موعدك الطبي</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .header { text-align: center; border-bottom: 2px solid #2dd4bf; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { color: #2dd4bf; margin: 0; }
        .content { font-size: 16px; }
        .details { background: #f9fafb; padding: 15px; border-radius: 6px; margin: 20px 0; border: 1px solid #e5e7eb; }
        .details p { margin: 8px 0; }
        .footer { text-align: center; font-size: 12px; color: #7d8590; margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>تأكيد موعدك الطبي</h1>
        </div>
        <div class="content">
            <p>السلام عليكم <strong>{{ $demand->patient_name }}</strong>،</p>
            <p>يسعدنا إخبارك بأنه تم تأكيد موعدك الطبي في القسم المحدد. يرجى الاطلاع على تفاصيل الموعد أدناه:</p>
            
            <div class="details">
                <p><strong>القسم / التخصص:</strong> {{ $demand->surgery_type }}</p>
                <p><strong>تاريخ الموعد:</strong> {{ $demand->confirmed_date }}</p>
                <p><strong>وقت الموعد:</strong> {{ \Carbon\Carbon::parse($demand->confirmed_time)->format('H:i') }}</p>
                <p><strong>حالة الموعد:</strong> مؤكد ✅</p>
            </div>
            
            <p><strong>تعليمات هامة:</strong></p>
            <ul>
                <li>يرجى الحضور قبل الموعد بـ 15 دقيقة على الأقل لإتمام إجراءات التسجيل.</li>
                <li>لا تنسَ إحضار كافة الوثائق والملفات الطبية السابقة المتعلقة بحالتك.</li>
            </ul>
            
            <p>نتمنى لك موفور الصحة والعافية.</p>
        </div>
        <div class="footer">
            <p>هذا البريد الإلكتروني مرسل تلقائياً من نظام SmartSurgery. يرجى عدم الرد على هذه الرسالة.</p>
        </div>
    </div>
</body>
</html>
