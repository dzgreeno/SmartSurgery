<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>طلبات العمليات — SmartSurgery</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{--bg:#0d1117;--bg2:#161b22;--bg3:#1c2128;--border:rgba(255,255,255,.08);--text:#e6edf3;--muted:#7d8590;--accent:#2dd4bf;--accent2:rgba(45,212,191,.12);--gold:#f0b429;--green:#3fb950;--red:#f85149;--blue:#58a6ff;--sidebar:240px;--topbar:56px;--r:8px;--t:.18s cubic-bezier(.4,0,.2,1);}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html,body{height:100%;font-family:'Cairo',sans-serif;background:var(--bg);color:var(--text)}
.btn-logout:hover{background:rgba(248,81,73,.2);}
</style>
@include('partials.sidebar')
<style>
.main-wrap{margin-right:var(--sidebar);min-height:100vh;display:flex;flex-direction:column;}
.topbar{height:var(--topbar);background:var(--bg2);border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 28px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:16px;font-weight:800;}
.content{padding:28px;flex:1;}
.table-card{background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden;margin-top:20px;}
.table-header{padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.table-header h3{font-size:15px;font-weight:800;}
table{width:100%;border-collapse:collapse;}
th{padding:12px 16px;font-size:11px;font-weight:700;color:var(--muted);text-align:right;border-bottom:1px solid var(--border);}
td{padding:14px 16px;font-size:13px;border-bottom:1px solid var(--border);}
tr:last-child td{border-bottom:none;}tr:hover td{background:var(--bg3);}
.badge{padding:4px 12px;border-radius:20px;font-size:11px;font-weight:700;}
.badge-pending  {background:rgba(240,180,41,.15);color:var(--gold);}
.badge-approved {background:rgba(63,185,80,.12);color:var(--green);}
.badge-rejected {background:rgba(248,81,73,.12);color:var(--red);}
.badge-scheduled{background:rgba(88,166,255,.12);color:var(--blue);}
.info-box{padding:40px;text-align:center;color:var(--muted);}
.info-box .icon{font-size:48px;margin-bottom:12px;}
.info-box p{font-size:14px;line-height:1.8;}
select.status-select{padding:6px 10px;background:var(--bg3);border:1px solid var(--border);color:var(--text);border-radius:6px;font-family:'Cairo',sans-serif;font-size:12px;cursor:pointer;}
</style>
</head>
<body>

<div class="main-wrap">
  <div class="topbar"><span class="topbar-title">📋 طلبات العمليات الجراحية</span></div>
  <div class="content">
    @if(session('success'))<div style="padding:10px 16px;background:rgba(63,185,80,.1);border:1px solid rgba(63,185,80,.2);color:var(--green);border-radius:var(--r);margin-bottom:16px;font-size:13px;">✅ {{ session('success') }}</div>@endif

    @php
      try {
        $demands = \App\Models\Demand::orderBy('created_at','desc')->get();
        $hasDemands = true;
      } catch(\Exception $e) {
        $demands = collect([]);
        $hasDemands = false;
      }
    @endphp

    @if(!$hasDemands)
    <div class="table-card">
      <div class="info-box">
        <div class="icon">📋</div>
        <p>قاعدة بيانات طلبات العمليات غير متاحة في بيئة الإنتاج حالياً.<br>
        يمكن إضافة هذه الميزة لاحقاً باستخدام Firebase Realtime Database.</p>
      </div>
    </div>
    @elseif($demands->isEmpty())
    <div class="table-card">
      <div class="info-box">
        <div class="icon">📭</div>
        <p>لا توجد طلبات عمليات حتى الآن.</p>
      </div>
    </div>
    @else
    <div class="table-card">
      <div class="table-header">
        <h3>📋 قائمة الطلبات</h3>
        <span style="font-size:12px;color:var(--muted);">{{ $demands->count() }} طلب</span>
      </div>
      <table>
        <thead><tr>
          <th>#</th><th>اسم المريض</th><th>نوع العملية</th><th>التاريخ المطلوب</th><th>الحالة</th><th>الإجراءات</th>
        </tr></thead>
        <tbody>
          @foreach($demands as $i => $d)
          <tr>
            <td>{{ $i+1 }}</td>
            <td><strong>{{ $d->patient_name }}</strong></td>
            <td>{{ $d->surgery_type }}</td>
            <td>{{ $d->requested_date }}</td>
            <td>
              @php $sc = ['pending'=>'badge-pending','approved'=>'badge-approved','rejected'=>'badge-rejected','scheduled'=>'badge-scheduled'];
              $sl = ['pending'=>'⏳ معلق','approved'=>'✅ مقبول','rejected'=>'❌ مرفوض','scheduled'=>'📅 مجدول']; @endphp
              <span class="badge {{ $sc[$d->status]??'' }}">{{ $sl[$d->status]??$d->status }}</span>
            </td>
            <td>
              <form action="{{ route('admin.demands.status',$d->id) }}" method="POST" style="display:inline;">
                @csrf
                <select name="status" class="status-select" onchange="this.form.submit()">
                  <option value="">— تغيير —</option>
                  <option value="approved">✅ قبول</option>
                  <option value="rejected">❌ رفض</option>
                  <option value="scheduled">📅 جدولة</option>
                </select>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</div>
</body>
</html>
