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
.sidebar{position:fixed;top:0;right:0;width:var(--sidebar);height:100vh;background:var(--bg2);border-left:1px solid var(--border);display:flex;flex-direction:column;z-index:100;overflow-y:auto;}
.sidebar-brand{padding:20px 16px;border-bottom:1px solid var(--border);}
.sidebar-brand h2{font-size:16px;font-weight:800;color:var(--accent);}
.user-info{margin-top:10px;padding:10px;background:var(--bg3);border-radius:var(--r);border:1px solid var(--border);}
.user-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#0891b2);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:800;color:#0d1117;margin-bottom:6px;}
.user-name{font-size:13px;font-weight:700;}.user-role{font-size:11px;color:var(--gold);background:rgba(240,180,41,.12);padding:2px 8px;border-radius:20px;display:inline-block;margin-top:2px;}.user-email{font-size:10px;color:var(--muted);}
.nav-section{padding:12px 8px 4px;font-size:10px;color:var(--muted);font-weight:700;letter-spacing:1px;}
.nav-link{display:flex;align-items:center;gap:10px;padding:10px 16px;font-size:13px;font-weight:600;color:var(--muted);text-decoration:none;border-radius:var(--r);margin:2px 8px;transition:all var(--t);}
.nav-link:hover{background:var(--bg3);color:var(--text);}.nav-link.active{background:var(--accent2);color:var(--accent);}
.sidebar-footer{margin-top:auto;padding:16px;border-top:1px solid var(--border);}
.btn-logout{width:100%;padding:10px;background:rgba(248,81,73,.1);border:1px solid rgba(248,81,73,.2);color:var(--red);border-radius:var(--r);font-family:'Cairo',sans-serif;font-size:13px;font-weight:700;cursor:pointer;}
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
.btn-confirm{background:rgba(45,212,191,.15);border:1px solid rgba(45,212,191,.3);color:var(--accent);padding:6px 12px;border-radius:6px;font-family:'Cairo',sans-serif;font-size:12px;font-weight:700;cursor:pointer;margin-right:8px;}
.btn-confirm:hover{background:var(--accent);color:#0d1117;}

/* Modal Styles */
.modal-overlay{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:999;align-items:center;justify-content:center;}
.modal-overlay.active{display:flex;}
.modal-content{background:var(--bg2);width:400px;border-radius:12px;padding:24px;border:1px solid var(--border);box-shadow:0 10px 30px rgba(0,0,0,0.5);}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;}
.modal-header h3{font-size:16px;color:var(--accent);}
.close-btn{background:none;border:none;color:var(--muted);font-size:20px;cursor:pointer;}
.form-group{margin-bottom:15px;}
.form-group label{display:block;font-size:13px;margin-bottom:6px;color:var(--text);}
.form-group input{width:100%;padding:10px;border-radius:6px;border:1px solid var(--border);background:var(--bg3);color:var(--text);font-family:'Cairo',sans-serif;}
.btn-submit{width:100%;background:var(--accent);color:#0d1117;border:none;padding:12px;border-radius:6px;font-family:'Cairo',sans-serif;font-weight:800;cursor:pointer;margin-top:10px;}
</style>
</head>
<body>
@include('components.admin-sidebar', ['active' => 'demands'])

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
                </select>
              </form>
              @if($d->status != 'scheduled')
                <button type="button" class="btn-confirm" onclick="openConfirmModal({{ $d->id }}, '{{ $d->patient_name }}')">📅 تأكيد الموعد</button>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</div>

<!-- Modal Date and Time -->
<div class="modal-overlay" id="confirmModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3>📅 تحديد موعد العملية النهائي</h3>
      <button class="close-btn" onclick="closeConfirmModal()">&times;</button>
    </div>
    <p id="modalPatientName" style="font-size:13px;color:var(--muted);margin-bottom:15px;"></p>
    <form id="confirmForm" method="POST" action="">
      @csrf
      <div class="form-group">
        <label>تاريخ الموعد</label>
        <input type="date" name="confirmed_date" required>
      </div>
      <div class="form-group">
        <label>وقت الموعد</label>
        <input type="time" name="confirmed_time" required>
      </div>
      <button type="submit" class="btn-submit">تأكيد وإرسال إشعار للمريض</button>
    </form>
  </div>
</div>

<script>
function openConfirmModal(id, name) {
    const modal = document.getElementById('confirmModal');
    const form = document.getElementById('confirmForm');
    const nameLabel = document.getElementById('modalPatientName');
    
    // Set form action dynamic
    form.action = `/admin/demands/${id}/confirm`;
    nameLabel.innerText = 'المريض: ' + name;
    
    modal.classList.add('active');
}

function closeConfirmModal() {
    document.getElementById('confirmModal').classList.remove('active');
}
</script>

</body>
</html>
