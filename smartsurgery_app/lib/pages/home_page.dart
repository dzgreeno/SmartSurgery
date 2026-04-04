import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'dart:async';

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  SystemChrome.setSystemUIOverlayStyle(const SystemUiOverlayStyle(
    statusBarColor: Color(0xFF071e26),
    statusBarIconBrightness: Brightness.light,
    systemNavigationBarColor: Color(0xFF0b3c49),
    systemNavigationBarIconBrightness: Brightness.light,
  ));
  runApp(const HospitalApp());
}

// ══════════════════════════════════════════════════════════
//  COLORS
// ══════════════════════════════════════════════════════════
class C {
  static const tealDeep  = Color(0xFF0b3c49);
  static const tealMid   = Color(0xFF0f4c5c);
  static const tealLight = Color(0xFF1a7a8a);
  static const tealGlow  = Color(0xFF2aa6b8);
  static const gold      = Color(0xFFffd166);
  static const goldDeep  = Color(0xFFf5a623);
  static const bodyBg    = Color(0xFFf0f6f8);
  static const card      = Color(0xFFffffff);
  static const textDark  = Color(0xFF1a2e35);
  static const textMuted = Color(0xFF4a6572);
  static const red       = Color(0xFFef4444);
}

// ══════════════════════════════════════════════════════════
//  ROOT
// ══════════════════════════════════════════════════════════
class HospitalApp extends StatelessWidget {
  const HospitalApp({super.key});
  @override
  Widget build(BuildContext context) => MaterialApp(
    title: 'مستشفى عاشور زيان',
    debugShowCheckedModeBanner: false,
    theme: ThemeData(
      useMaterial3: true,
      colorSchemeSeed: C.tealMid,
      scaffoldBackgroundColor: C.bodyBg,
      fontFamily: 'Cairo',
      appBarTheme: const AppBarTheme(
        backgroundColor: Colors.white,
        foregroundColor: C.tealDeep,
        elevation: 0,
        scrolledUnderElevation: 4,
        shadowColor: Color(0x220b3c49),
        centerTitle: true,
        titleTextStyle: TextStyle(
          fontFamily: 'Cairo',
          fontSize: 16,
          fontWeight: FontWeight.w700,
          color: C.tealDeep,
        ),
      ),
      navigationBarTheme: NavigationBarThemeData(
        backgroundColor: Colors.white,
        elevation: 12,
        shadowColor: C.tealDeep.withOpacity(.18),
        indicatorColor: C.tealMid.withOpacity(.15),
        labelTextStyle: WidgetStateProperty.resolveWith((s) => TextStyle(
          fontFamily: 'Cairo',
          fontSize: 10,
          fontWeight: FontWeight.w600,
          color: s.contains(WidgetState.selected) ? C.tealMid : C.textMuted,
        )),
        iconTheme: WidgetStateProperty.resolveWith((s) => IconThemeData(
          color: s.contains(WidgetState.selected) ? C.tealMid : C.textMuted,
          size: 22,
        )),
      ),
    ),
    home: const RootScreen(),
  );
}

// ══════════════════════════════════════════════════════════
//  ROOT SCREEN — Bottom Nav
// ══════════════════════════════════════════════════════════
class RootScreen extends StatefulWidget {
  const RootScreen({super.key});
  @override
  State<RootScreen> createState() => _RootScreenState();
}

class _RootScreenState extends State<RootScreen> {
  int _page = 0;

  static const _items = [
    NavigationBarItem(icon: Icons.home_rounded,         label: 'الرئيسية'),
    NavigationBarItem(icon: Icons.medical_services_rounded, label: 'الأقسام'),
    NavigationBarItem(icon: Icons.calendar_month_rounded,   label: 'الحجز'),
    NavigationBarItem(icon: Icons.info_rounded,          label: 'نبذة'),
    NavigationBarItem(icon: Icons.phone_rounded,         label: 'اتصل'),
  ];

  final _pages = const [
    HomePage(),
    DepartmentsPage(),
    AppointmentPage(),
    AboutPage(),
    ContactPage(),
  ];

  @override
  Widget build(BuildContext context) => Directionality(
    textDirection: TextDirection.rtl,
    child: Scaffold(
      body: AnimatedSwitcher(
        duration: const Duration(milliseconds: 280),
        switchInCurve: Curves.easeOutCubic,
        switchOutCurve: Curves.easeInCubic,
        child: KeyedSubtree(key: ValueKey(_page), child: _pages[_page]),
      ),
      bottomNavigationBar: NavigationBar(
        selectedIndex: _page,
        onDestinationSelected: (i) => setState(() => _page = i),
        destinations: _items.map((it) => NavigationDestination(
          icon: Icon(it.icon),
          selectedIcon: Icon(it.icon, color: C.tealMid),
          label: it.label,
        )).toList(),
      ),
    ),
  );
}

class NavigationBarItem {
  final IconData icon;
  final String label;
  const NavigationBarItem({required this.icon, required this.label});
}

// ══════════════════════════════════════════════════════════
//  PAGE 1 — HOME
// ══════════════════════════════════════════════════════════
class HomePage extends StatefulWidget {
  const HomePage({super.key});
  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  int _heroIdx = 0;
  late Timer _timer;

  final _heroData = const [
    _HeroData('رعاية صحية متكاملة بأيدٍ متخصصة',
        'نقدم خدمات طبية متنوعة وعالية الجودة لسكان أولاد جلال والمناطق المجاورة.',
        Color(0xFF071e26)),
    _HeroData('طاقم طبي خبير على مدار الساعة',
        'فريقنا الطبي جاهز لاستقبالكم وتقديم أفضل رعاية صحية في أي وقت.',
        Color(0xFF0b3c49)),
    _HeroData('أحدث التقنيات الطبية في خدمتكم',
        'مجهزون بأحدث الأجهزة الطبية لتشخيص وعلاج جميع الحالات بدقة.',
        Color(0xFF0f4c5c)),
    _HeroData('نخدم أكثر من 6 بلديات',
        'تغطية طبية شاملة بخدمات متكاملة ومستمرة لصحة مجتمعنا.',
        Color(0xFF145a6a)),
  ];

  @override
  void initState() {
    super.initState();
    _timer = Timer.periodic(const Duration(seconds: 5), (_) {
      if (mounted) setState(() => _heroIdx = (_heroIdx + 1) % _heroData.length);
    });
  }

  @override
  void dispose() { _timer.cancel(); super.dispose(); }

  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: C.bodyBg,
    body: CustomScrollView(
      slivers: [
        // ── AppBar ──
        SliverAppBar(
          pinned: true,
          backgroundColor: Colors.white,
          leading: const _LogoWidget(),
          leadingWidth: 160,
          actions: [
            _PulseDot(),
            const SizedBox(width: 6),
            const Text('طوارئ 24/7',
                style: TextStyle(fontSize: 10, color: C.red, fontWeight: FontWeight.w700)),
            const SizedBox(width: 12),
            _GoldButton(label: 'دخول', icon: Icons.lock_rounded, onTap: () {}),
            const SizedBox(width: 12),
          ],
        ),

        // ── Hero ──
        SliverToBoxAdapter(child: _HeroCard(data: _heroData[_heroIdx], idx: _heroIdx, total: _heroData.length,
            onDot: (i) => setState(() => _heroIdx = i))),

        // ── Stats ──
        SliverToBoxAdapter(child: _StatsRow()),

        // ── Emergency banner ──
        SliverToBoxAdapter(child: _EmergencyBanner()),

        // ── Section title ──
        SliverToBoxAdapter(child: _SecHeader(eyebrow: 'أقسامنا', title: 'التخصصات الطبية')),

        // ── Departments horizontal scroll ──
        SliverToBoxAdapter(child: _DeptScroll()),

        // ── Info cards ──
        SliverToBoxAdapter(child: _SecHeader(eyebrow: 'معلومات', title: 'كل ما تحتاجه')),
        SliverToBoxAdapter(child: _InfoCards()),

        const SliverToBoxAdapter(child: SizedBox(height: 24)),
      ],
    ),
  );
}

class _HeroData {
  final String title, subtitle;
  final Color color;
  const _HeroData(this.title, this.subtitle, this.color);
}

class _HeroCard extends StatelessWidget {
  final _HeroData data;
  final int idx, total;
  final ValueChanged<int> onDot;
  const _HeroCard({required this.data, required this.idx, required this.total, required this.onDot});

  @override
  Widget build(BuildContext context) => AnimatedContainer(
    duration: const Duration(milliseconds: 700),
    curve: Curves.easeInOut,
    decoration: BoxDecoration(
      gradient: LinearGradient(
        begin: Alignment.topRight,
        end: Alignment.bottomLeft,
        colors: [data.color, C.tealLight.withOpacity(.8)],
      ),
    ),
    padding: const EdgeInsets.fromLTRB(20, 32, 20, 20),
    child: Column(crossAxisAlignment: CrossAxisAlignment.end, children: [
      // Badge
      Container(
        padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 4),
        decoration: BoxDecoration(color: C.gold, borderRadius: BorderRadius.circular(20)),
        child: const Text('🏅 أولاد جلال — بسكرة',
            style: TextStyle(color: C.tealDeep, fontSize: 11, fontWeight: FontWeight.w700)),
      ),
      const SizedBox(height: 14),
      // Title
      AnimatedSwitcher(
        duration: const Duration(milliseconds: 500),
        child: Text(data.title, key: ValueKey(idx), textAlign: TextAlign.right,
            style: const TextStyle(fontFamily: 'Amiri', fontSize: 26,
                fontWeight: FontWeight.w700, color: Colors.white, height: 1.4)),
      ),
      const SizedBox(height: 8),
      AnimatedSwitcher(
        duration: const Duration(milliseconds: 500),
        child: Text(data.subtitle, key: ValueKey('s$idx'), textAlign: TextAlign.right,
            style: const TextStyle(color: Colors.white70, fontSize: 13, height: 1.6)),
      ),
      const SizedBox(height: 20),
      // Buttons
      Row(mainAxisAlignment: MainAxisAlignment.end, children: [
        _HeroBtn(label: '🏥 الأقسام', outline: true, onTap: () {}),
        const SizedBox(width: 10),
        _HeroBtn(label: '📅 احجز الآن', outline: false, onTap: () {}),
      ]),
      const SizedBox(height: 20),
      // Dots
      Row(mainAxisAlignment: MainAxisAlignment.center, children: List.generate(total, (i) {
        final active = i == idx;
        return GestureDetector(
          onTap: () => onDot(i),
          child: AnimatedContainer(
            duration: const Duration(milliseconds: 300),
            margin: const EdgeInsets.symmetric(horizontal: 3),
            width: active ? 26 : 7, height: 7,
            decoration: BoxDecoration(
              color: active ? C.gold : Colors.white38,
              borderRadius: BorderRadius.circular(4),
            ),
          ),
        );
      })),
    ]),
  );
}

class _HeroBtn extends StatelessWidget {
  final String label;
  final bool outline;
  final VoidCallback onTap;
  const _HeroBtn({required this.label, required this.outline, required this.onTap});

  @override
  Widget build(BuildContext context) => Material(
    color: outline ? Colors.transparent : C.gold,
    borderRadius: BorderRadius.circular(10),
    child: InkWell(
      borderRadius: BorderRadius.circular(10),
      onTap: onTap,
      child: Container(
        padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
        decoration: outline
            ? BoxDecoration(border: Border.all(color: Colors.white60, width: 1.5),
                borderRadius: BorderRadius.circular(10))
            : null,
        child: Text(label,
            style: TextStyle(
              color: outline ? Colors.white : C.tealDeep,
              fontSize: 12, fontWeight: FontWeight.w700)),
      ),
    ),
  );
}

class _StatsRow extends StatelessWidget {
  final _stats = const [
    {'n': '526', 'l': 'كادر طبي'},
    {'n': '6',   'l': 'بلديات'},
    {'n': '12',  'l': 'قسم طبي'},
    {'n': '24/7','l': 'طوارئ'},
  ];
  @override
  Widget build(BuildContext context) => Container(
    decoration: const BoxDecoration(
      gradient: LinearGradient(colors: [C.tealDeep, C.tealMid]),
    ),
    child: Row(
      children: _stats.asMap().entries.map((e) => Expanded(
        child: Container(
          padding: const EdgeInsets.symmetric(vertical: 18),
          decoration: BoxDecoration(
            border: e.key < _stats.length - 1
                ? const Border(left: BorderSide(color: Colors.white12)) : null,
          ),
          child: Column(children: [
            Text(e.value['n']!, style: const TextStyle(
                fontSize: 22, fontWeight: FontWeight.w900, color: C.gold)),
            const SizedBox(height: 2),
            Text(e.value['l']!, textAlign: TextAlign.center,
                style: const TextStyle(color: Colors.white60, fontSize: 10)),
          ]),
        ),
      )).toList(),
    ),
  );
}

class _EmergencyBanner extends StatelessWidget {
  @override
  Widget build(BuildContext context) => Material(
    color: const Color(0xFFB91C1C),
    child: InkWell(
      onTap: () {},
      child: Container(
        padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
        child: Row(children: [
          const Text('🚑', style: TextStyle(fontSize: 20)),
          const SizedBox(width: 10),
          const Expanded(
            child: Text('خط الطوارئ العاجلة — متاح 24/24',
                style: TextStyle(color: Colors.white, fontSize: 12, fontWeight: FontWeight.w600)),
          ),
          Container(
            padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 4),
            decoration: BoxDecoration(color: C.gold, borderRadius: BorderRadius.circular(20)),
            child: const Text('014 25 36 78',
                style: TextStyle(color: C.tealDeep, fontSize: 12, fontWeight: FontWeight.w900, letterSpacing: 1)),
          ),
        ]),
      ),
    ),
  );
}

class _DeptScroll extends StatelessWidget {
  final _depts = const [
    {'icon': '🩺', 'name': 'جراحة النساء', 'color': Color(0xFF0f4c5c)},
    {'icon': '👶', 'name': 'الأمومة',       'color': Color(0xFF1a7a8a)},
    {'icon': '🚨', 'name': 'الطوارئ',       'color': Color(0xFFef4444)},
    {'icon': '🔬', 'name': 'المخبر',        'color': Color(0xFF0b3c49)},
    {'icon': '🦴', 'name': 'العظام',        'color': Color(0xFF145a6a)},
    {'icon': '🔵', 'name': 'المسالك البولية','color': Color(0xFF0d5470)},
  ];

  @override
  Widget build(BuildContext context) => SizedBox(
    height: 110,
    child: ListView.builder(
      scrollDirection: Axis.horizontal,
      padding: const EdgeInsets.symmetric(horizontal: 16),
      itemCount: _depts.length,
      itemBuilder: (_, i) {
        final d = _depts[i];
        return GestureDetector(
          onTap: () {},
          child: Container(
            width: 90,
            margin: const EdgeInsets.only(left: 12, top: 4, bottom: 4),
            decoration: BoxDecoration(
              color: C.card,
              borderRadius: BorderRadius.circular(14),
              boxShadow: [BoxShadow(color: C.tealDeep.withOpacity(.1), blurRadius: 12, offset: const Offset(0, 4))],
            ),
            child: Column(mainAxisAlignment: MainAxisAlignment.center, children: [
              Container(
                width: 44, height: 44,
                decoration: BoxDecoration(
                  gradient: LinearGradient(colors: [d['color'] as Color, C.tealLight]),
                  borderRadius: BorderRadius.circular(12),
                ),
                child: Center(child: Text(d['icon'] as String, style: const TextStyle(fontSize: 20))),
              ),
              const SizedBox(height: 8),
              Text(d['name'] as String, textAlign: TextAlign.center,
                  style: const TextStyle(fontSize: 10, fontWeight: FontWeight.w600, color: C.textDark),
                  maxLines: 2, overflow: TextOverflow.ellipsis),
            ]),
          ),
        );
      },
    ),
  );
}

class _InfoCards extends StatelessWidget {
  final _cards = const [
    {'icon': '⚖️', 'tag': 'حقوق',    'title': 'حقوق المريض',
     'text': 'نضمن احترام حقوق جميع المرضى مع ضمان جودة العلاج.'},
    {'icon': '🤝', 'tag': 'شراكات',  'title': 'شركاء الصحة — CNAS',
     'text': 'تعاون مع CNAS وCASNOS لتقديم أفضل رعاية للمرضى.'},
    {'icon': '💊', 'tag': 'رعاية',   'title': 'رعاية شاملة ومعتمدة',
     'text': 'رعاية صحية معتمدة مع التغطية الكاملة لمراكز التأمين.'},
  ];

  @override
  Widget build(BuildContext context) => ListView.builder(
    shrinkWrap: true,
    physics: const NeverScrollableScrollPhysics(),
    padding: const EdgeInsets.symmetric(horizontal: 16),
    itemCount: _cards.length,
    itemBuilder: (_, i) {
      final c = _cards[i];
      return Card(
        margin: const EdgeInsets.only(bottom: 12),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        elevation: 3,
        shadowColor: C.tealDeep.withOpacity(.12),
        child: ListTile(
          contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
          leading: Container(
            width: 44, height: 44,
            decoration: BoxDecoration(
              gradient: const LinearGradient(colors: [C.tealMid, C.tealLight]),
              borderRadius: BorderRadius.circular(12),
            ),
            child: Center(child: Text(c['icon']!, style: const TextStyle(fontSize: 20))),
          ),
          title: Text(c['title']!,
              style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w700, color: C.tealDeep)),
          subtitle: Padding(
            padding: const EdgeInsets.only(top: 4),
            child: Text(c['text']!,
                style: const TextStyle(fontSize: 12, color: C.textMuted, height: 1.5)),
          ),
          trailing: const Icon(Icons.arrow_back_ios_rounded, size: 14, color: C.tealLight),
        ),
      );
    },
  );
}

// ══════════════════════════════════════════════════════════
//  PAGE 2 — DEPARTMENTS
// ══════════════════════════════════════════════════════════
class DepartmentsPage extends StatelessWidget {
  const DepartmentsPage({super.key});

  static const _depts = [
    {'icon': '🩺', 'name': 'جراحة النساء والتوليد',
     'desc': 'رعاية متخصصة للمرأة قبل وبعد الولادة بأحدث الأجهزة وأيدٍ خبيرة.',
     'color': Color(0xFF0f4c5c)},
    {'icon': '👶', 'name': 'الأمومة والطفولة',
     'desc': 'متابعة شاملة للحمل ورعاية الطفل من الولادة بأيدٍ أمينة ومتخصصة.',
     'color': Color(0xFF1a7a8a)},
    {'icon': '🚨', 'name': 'قسم الطوارئ',
     'desc': 'استقبال فوري للحالات الحرجة على مدار الساعة بتدخل طبي سريع وفعال.',
     'color': Color(0xFFef4444)},
    {'icon': '🔬', 'name': 'التشخيص والمخبر',
     'desc': 'تحاليل طبية وأشعة وإيكوغرافيا بأجهزة حديثة ونتائج دقيقة وسريعة.',
     'color': Color(0xFF0b3c49)},
    {'icon': '🦴', 'name': 'جراحة العظام والمفاصل',
     'desc': 'علاج الكسور واستبدال المفاصل وجراحة العمود الفقري بأحدث التقنيات.',
     'color': Color(0xFF145a6a)},
    {'icon': '🔵', 'name': 'المسالك البولية',
     'desc': 'علاج حصوات الكلى وأمراض البروستاتا بأحدث تقنيات الليزر والمنظار.',
     'color': Color(0xFF0d5470)},
  ];

  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: C.bodyBg,
    appBar: AppBar(
      title: const Text('الأقسام الطبية'),
      leading: const _LogoWidget(),
      leadingWidth: 160,
    ),
    body: GridView.builder(
      padding: const EdgeInsets.all(16),
      gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
        crossAxisCount: 2, mainAxisSpacing: 14, crossAxisSpacing: 14, childAspectRatio: .82,
      ),
      itemCount: _depts.length,
      itemBuilder: (_, i) => _DeptGridCard(dept: _depts[i]),
    ),
  );
}

class _DeptGridCard extends StatelessWidget {
  final Map<String, Object> dept;
  const _DeptGridCard({required this.dept});

  @override
  Widget build(BuildContext context) => Card(
    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
    elevation: 4,
    shadowColor: C.tealDeep.withOpacity(.12),
    child: InkWell(
      borderRadius: BorderRadius.circular(16),
      onTap: () {},
      child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
        // color bar
        Container(height: 4,
          decoration: BoxDecoration(
            gradient: LinearGradient(colors: [dept['color'] as Color, C.gold]),
            borderRadius: const BorderRadius.vertical(top: Radius.circular(16)),
          ),
        ),
        Padding(
          padding: const EdgeInsets.all(14),
          child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
            Container(
              width: 46, height: 46,
              decoration: BoxDecoration(
                gradient: LinearGradient(colors: [dept['color'] as Color, C.tealLight]),
                borderRadius: BorderRadius.circular(13),
                boxShadow: [BoxShadow(color: (dept['color'] as Color).withOpacity(.25), blurRadius: 10)],
              ),
              child: Center(child: Text(dept['icon'] as String, style: const TextStyle(fontSize: 22))),
            ),
            const SizedBox(height: 12),
            Text(dept['name'] as String,
                style: const TextStyle(fontSize: 13, fontWeight: FontWeight.w700, color: C.tealDeep)),
            const SizedBox(height: 6),
            Text(dept['desc'] as String,
                style: const TextStyle(fontSize: 11, color: C.textMuted, height: 1.5),
                maxLines: 3, overflow: TextOverflow.ellipsis),
            const SizedBox(height: 10),
            Row(children: const [
              Text('اكتشف', style: TextStyle(fontSize: 11, fontWeight: FontWeight.w600, color: C.tealLight)),
              SizedBox(width: 3),
              Icon(Icons.arrow_back_ios_rounded, size: 10, color: C.tealLight),
            ]),
          ]),
        ),
      ]),
    ),
  );
}

// ══════════════════════════════════════════════════════════
//  PAGE 3 — APPOINTMENT
// ══════════════════════════════════════════════════════════
class AppointmentPage extends StatefulWidget {
  const AppointmentPage({super.key});
  @override
  State<AppointmentPage> createState() => _AppointmentPageState();
}

class _AppointmentPageState extends State<AppointmentPage> {
  final _form = GlobalKey<FormState>();
  final _fname = TextEditingController();
  final _lname = TextEditingController();
  final _phone = TextEditingController();
  String? _spec;
  DateTime? _date;

  static const _specs = [
    'جراحة النساء والتوليد', 'الأمومة والطفولة',
    'الجراحة العامة', 'جراحة العظام',
    'المسالك البولية', 'طب الطوارئ',
  ];

  Future<void> _pickDate() async {
    final d = await showDatePicker(
      context: context,
      initialDate: DateTime.now().add(const Duration(days: 1)),
      firstDate: DateTime.now(),
      lastDate: DateTime.now().add(const Duration(days: 90)),
      builder: (ctx, child) => Theme(
        data: Theme.of(ctx).copyWith(
          colorScheme: const ColorScheme.light(primary: C.tealMid, onPrimary: Colors.white),
        ),
        child: child!,
      ),
    );
    if (d != null) setState(() => _date = d);
  }

  void _submit() {
    if (!(_form.currentState?.validate() ?? false) || _spec == null || _date == null) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('يرجى ملء جميع الحقول'), backgroundColor: C.red),
      );
      return;
    }
    showDialog(
      context: context,
      builder: (_) => Directionality(
        textDirection: TextDirection.rtl,
        child: AlertDialog(
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(20)),
          icon: const Icon(Icons.check_circle_rounded, color: Colors.green, size: 48),
          title: const Text('تم الحجز بنجاح!', textAlign: TextAlign.center,
              style: TextStyle(color: C.tealDeep, fontWeight: FontWeight.w700)),
          content: const Text('سيتصل بك فريقنا الطبي قريباً لتأكيد موعدك.',
              textAlign: TextAlign.center, style: TextStyle(color: C.textMuted)),
          actions: [
            FilledButton(
              style: FilledButton.styleFrom(backgroundColor: C.tealMid),
              onPressed: () => Navigator.pop(context),
              child: const Text('حسناً'),
            ),
          ],
        ),
      ),
    );
    _fname.clear(); _lname.clear(); _phone.clear();
    setState(() { _spec = null; _date = null; });
  }

  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: C.bodyBg,
    appBar: AppBar(title: const Text('حجز موعد')),
    body: SingleChildScrollView(
      padding: const EdgeInsets.all(16),
      child: Form(
        key: _form,
        child: Column(crossAxisAlignment: CrossAxisAlignment.stretch, children: [
          // Header card
          Container(
            padding: const EdgeInsets.all(20),
            decoration: BoxDecoration(
              gradient: const LinearGradient(colors: [C.tealDeep, C.tealMid]),
              borderRadius: BorderRadius.circular(20),
            ),
            child: Column(crossAxisAlignment: CrossAxisAlignment.end, children: [
              const Text('احجز موعدك الطبي',
                  style: TextStyle(fontFamily: 'Amiri', fontSize: 22,
                      color: Colors.white, fontWeight: FontWeight.w700)),
              const SizedBox(height: 8),
              const Text('احجز بخطوات بسيطة وسريعة',
                  style: TextStyle(color: Colors.white60, fontSize: 13)),
              const SizedBox(height: 16),
              Row(mainAxisAlignment: MainAxisAlignment.end, children: const [
                _StepChip(n: '3', t: 'تأكيد'),
                SizedBox(width: 8),
                _StepChip(n: '2', t: 'بياناتك'),
                SizedBox(width: 8),
                _StepChip(n: '1', t: 'التخصص'),
              ]),
            ]),
          ),
          const SizedBox(height: 20),

          // Form card
          Card(
            shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
            elevation: 3,
            shadowColor: C.tealDeep.withOpacity(.1),
            child: Padding(
              padding: const EdgeInsets.all(18),
              child: Column(children: [
                Row(children: [
                  Expanded(child: _FormField(ctrl: _fname, label: 'الاسم', hint: 'محمد')),
                  const SizedBox(width: 12),
                  Expanded(child: _FormField(ctrl: _lname, label: 'اللقب', hint: 'بن علي')),
                ]),
                const SizedBox(height: 14),
                _FormField(ctrl: _phone, label: 'رقم الهاتف',
                    hint: '0555 000 000', type: TextInputType.phone),
                const SizedBox(height: 14),

                // Spec dropdown
                DropdownButtonFormField<String>(
                  value: _spec,
                  decoration: _inputDeco('التخصص المطلوب'),
                  hint: const Text('اختر التخصص...', style: TextStyle(fontSize: 13)),
                  items: _specs.map((s) => DropdownMenuItem(value: s,
                      child: Text(s, style: const TextStyle(fontSize: 13)))).toList(),
                  onChanged: (v) => setState(() => _spec = v),
                ),
                const SizedBox(height: 14),

                // Date picker
                GestureDetector(
                  onTap: _pickDate,
                  child: AbsorbPointer(
                    child: TextFormField(
                      readOnly: true,
                      decoration: _inputDeco('التاريخ المفضل').copyWith(
                        suffixIcon: const Icon(Icons.calendar_today_rounded, color: C.tealLight, size: 18),
                        hintText: _date == null ? 'اختر التاريخ...'
                            : '${_date!.year}/${_date!.month.toString().padLeft(2,'0')}/${_date!.day.toString().padLeft(2,'0')}',
                        hintStyle: TextStyle(
                            color: _date == null ? Colors.grey : C.tealDeep,
                            fontSize: 13),
                      ),
                    ),
                  ),
                ),
              ]),
            ),
          ),
          const SizedBox(height: 16),

          // Submit
          FilledButton.icon(
            style: FilledButton.styleFrom(
              backgroundColor: C.tealMid,
              padding: const EdgeInsets.symmetric(vertical: 14),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
              textStyle: const TextStyle(fontFamily: 'Cairo', fontSize: 15, fontWeight: FontWeight.w700),
            ),
            onPressed: _submit,
            icon: const Icon(Icons.check_circle_rounded),
            label: const Text('تأكيد الحجز'),
          ),
          const SizedBox(height: 8),
          OutlinedButton.icon(
            style: OutlinedButton.styleFrom(
              foregroundColor: C.tealMid,
              side: const BorderSide(color: C.tealLight),
              padding: const EdgeInsets.symmetric(vertical: 13),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
              textStyle: const TextStyle(fontFamily: 'Cairo', fontSize: 14, fontWeight: FontWeight.w600),
            ),
            onPressed: () {},
            icon: const Icon(Icons.phone_rounded),
            label: const Text('احجز عبر الهاتف'),
          ),
        ]),
      ),
    ),
  );

  InputDecoration _inputDeco(String label) => InputDecoration(
    labelText: label,
    labelStyle: const TextStyle(color: C.tealLight, fontSize: 13, fontWeight: FontWeight.w600),
    border: OutlineInputBorder(borderRadius: BorderRadius.circular(12)),
    enabledBorder: OutlineInputBorder(
        borderRadius: BorderRadius.circular(12),
        borderSide: BorderSide(color: C.tealLight.withOpacity(.3))),
    focusedBorder: OutlineInputBorder(
        borderRadius: BorderRadius.circular(12),
        borderSide: const BorderSide(color: C.tealMid, width: 1.8)),
    filled: true,
    fillColor: Colors.white,
    contentPadding: const EdgeInsets.symmetric(horizontal: 14, vertical: 12),
  );
}

class _StepChip extends StatelessWidget {
  final String n, t;
  const _StepChip({required this.n, required this.t});
  @override
  Widget build(BuildContext context) => Row(children: [
    Container(
      width: 24, height: 24,
      decoration: const BoxDecoration(color: C.gold, shape: BoxShape.circle),
      child: Center(child: Text(n, style: const TextStyle(
          color: C.tealDeep, fontSize: 11, fontWeight: FontWeight.w700))),
    ),
    const SizedBox(width: 5),
    Text(t, style: const TextStyle(color: Colors.white70, fontSize: 12)),
  ]);
}

class _FormField extends StatelessWidget {
  final TextEditingController ctrl;
  final String label, hint;
  final TextInputType type;
  const _FormField({required this.ctrl, required this.label, required this.hint,
      this.type = TextInputType.text});

  @override
  Widget build(BuildContext context) => TextFormField(
    controller: ctrl,
    keyboardType: type,
    textDirection: TextDirection.rtl,
    validator: (v) => v == null || v.isEmpty ? 'مطلوب' : null,
    decoration: InputDecoration(
      labelText: label,
      hintText: hint,
      labelStyle: const TextStyle(color: C.tealLight, fontSize: 13, fontWeight: FontWeight.w600),
      border: OutlineInputBorder(borderRadius: BorderRadius.circular(12)),
      enabledBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(12),
          borderSide: BorderSide(color: C.tealLight.withOpacity(.3))),
      focusedBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(12),
          borderSide: const BorderSide(color: C.tealMid, width: 1.8)),
      filled: true, fillColor: Colors.white,
      contentPadding: const EdgeInsets.symmetric(horizontal: 14, vertical: 12),
    ),
  );
}

// ══════════════════════════════════════════════════════════
//  PAGE 4 — ABOUT
// ══════════════════════════════════════════════════════════
class AboutPage extends StatelessWidget {
  const AboutPage({super.key});
  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: C.bodyBg,
    appBar: AppBar(title: const Text('نبذة عنا')),
    body: SingleChildScrollView(
      padding: const EdgeInsets.all(16),
      child: Column(children: [
        // Header
        Container(
          width: double.infinity, padding: const EdgeInsets.all(24),
          decoration: BoxDecoration(
            gradient: const LinearGradient(colors: [C.tealDeep, C.tealMid]),
            borderRadius: BorderRadius.circular(20),
          ),
          child: Column(children: [
            Container(
              width: 72, height: 72,
              decoration: BoxDecoration(
                gradient: const LinearGradient(colors: [C.tealLight, C.tealGlow]),
                borderRadius: BorderRadius.circular(20),
              ),
              child: const Center(child: Text('🏥', style: TextStyle(fontSize: 34))),
            ),
            const SizedBox(height: 14),
            const Text('المؤسسة العمومية الاستشفائية',
                style: TextStyle(color: Colors.white70, fontSize: 12)),
            const Text('عاشور زيان',
                style: TextStyle(fontFamily: 'Amiri', color: C.gold, fontSize: 24, fontWeight: FontWeight.w700)),
            const SizedBox(height: 6),
            const Text('أولاد جلال — ولاية بسكرة 🇩🇿',
                style: TextStyle(color: Colors.white54, fontSize: 12)),
          ]),
        ),
        const SizedBox(height: 16),
        _AboutCard(icon: Icons.info_rounded, title: 'من نحن',
            text: 'المؤسسة العمومية الاستشفائية عاشور زيان تقدم خدمات طبية متكاملة لسكان أولاد جلال والبلديات المجاورة بطاقم طبي وشبه طبي وإداري متخصص.'),
        _AboutCard(icon: Icons.verified_rounded, title: 'رسالتنا',
            text: 'تقديم رعاية صحية شاملة وعالية الجودة لجميع المواطنين مع الحفاظ على كرامتهم وصون حقوقهم في أفضل ظروف ممكنة.'),
        _AboutCard(icon: Icons.groups_rounded, title: 'كادرنا الطبي',
            text: 'يضم المستشفى أكثر من 526 عنصراً بين كادر طبي وشبه طبي وإداري يعملون بشكل متواصل لتقديم أفضل الخدمات.'),
        _AboutCard(icon: Icons.shield_rounded, title: 'شراكاتنا',
            text: 'نتعاون مع CNAS وCASNOS وخدمات الصحة المهنية لتوفير تغطية صحية شاملة لجميع المرضى المؤمنين.'),
      ]),
    ),
  );
}

class _AboutCard extends StatelessWidget {
  final IconData icon;
  final String title, text;
  const _AboutCard({required this.icon, required this.title, required this.text});
  @override
  Widget build(BuildContext context) => Card(
    margin: const EdgeInsets.only(bottom: 12),
    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
    elevation: 3,
    shadowColor: C.tealDeep.withOpacity(.1),
    child: Padding(
      padding: const EdgeInsets.all(16),
      child: Row(crossAxisAlignment: CrossAxisAlignment.start, children: [
        Container(
          width: 44, height: 44,
          decoration: BoxDecoration(
            gradient: const LinearGradient(colors: [C.tealMid, C.tealLight]),
            borderRadius: BorderRadius.circular(12),
          ),
          child: Icon(icon, color: Colors.white, size: 22),
        ),
        const SizedBox(width: 14),
        Expanded(child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
          Text(title, style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w700, color: C.tealDeep)),
          const SizedBox(height: 6),
          Text(text, style: const TextStyle(fontSize: 12.5, color: C.textMuted, height: 1.6)),
        ])),
      ]),
    ),
  );
}

// ══════════════════════════════════════════════════════════
//  PAGE 5 — CONTACT
// ══════════════════════════════════════════════════════════
class ContactPage extends StatelessWidget {
  const ContactPage({super.key});

  static const _contacts = [
    {'icon': '📍', 'title': 'موقعنا', 'sub': 'أولاد جلال — ولاية بسكرة، الجزائر',
     'btn': 'عرض الخريطة', 'color': Color(0xFF0f4c5c)},
    {'icon': '📞', 'title': 'الهاتف',  'sub': '014 25 36 78',
     'btn': 'اتصل الآن',    'color': Color(0xFF1a7a8a)},
    {'icon': '🚑', 'title': 'الطوارئ', 'sub': 'متاح 24 ساعة — 7 أيام',
     'btn': 'اتصل فوراً',  'color': Color(0xFFef4444)},
    {'icon': '📧', 'title': 'البريد',  'sub': 'contact@hopital-achour-ziane.dz',
     'btn': 'أرسل رسالة',  'color': Color(0xFF0b3c49)},
    {'icon': '🕐', 'title': 'أوقات العمل', 'sub': 'الأحد – الخميس: 08:00 – 20:00',
     'btn': 'احجز موعد',   'color': Color(0xFF145a6a)},
  ];

  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: C.bodyBg,
    appBar: AppBar(title: const Text('اتصل بنا')),
    body: ListView(
      padding: const EdgeInsets.all(16),
      children: [
        // Map placeholder
        Container(
          height: 140,
          decoration: BoxDecoration(
            gradient: const LinearGradient(colors: [C.tealDeep, C.tealMid]),
            borderRadius: BorderRadius.circular(16),
          ),
          child: const Column(mainAxisAlignment: MainAxisAlignment.center, children: [
            Text('📍', style: TextStyle(fontSize: 36)),
            SizedBox(height: 8),
            Text('أولاد جلال — ولاية بسكرة', style: TextStyle(color: Colors.white, fontSize: 14, fontWeight: FontWeight.w600)),
            Text('الجزائر 🇩🇿', style: TextStyle(color: Colors.white54, fontSize: 12)),
          ]),
        ),
        const SizedBox(height: 16),
        ..._contacts.map((c) => Card(
          margin: const EdgeInsets.only(bottom: 12),
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
          elevation: 3,
          shadowColor: C.tealDeep.withOpacity(.1),
          child: ListTile(
            contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
            leading: Container(
              width: 46, height: 46,
              decoration: BoxDecoration(
                gradient: LinearGradient(colors: [c['color'] as Color, C.tealLight]),
                borderRadius: BorderRadius.circular(12),
              ),
              child: Center(child: Text(c['icon'] as String, style: const TextStyle(fontSize: 22))),
            ),
            title: Text(c['title'] as String,
                style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w700, color: C.tealDeep)),
            subtitle: Padding(
              padding: const EdgeInsets.only(top: 3),
              child: Text(c['sub'] as String,
                  style: const TextStyle(fontSize: 12, color: C.textMuted)),
            ),
            trailing: TextButton(
              style: TextButton.styleFrom(
                backgroundColor: C.tealMid.withOpacity(.08),
                foregroundColor: C.tealMid,
                padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
                textStyle: const TextStyle(fontFamily: 'Cairo', fontSize: 11, fontWeight: FontWeight.w700),
              ),
              onPressed: () {},
              child: Text(c['btn'] as String),
            ),
          ),
        )),

        // Social
        const SizedBox(height: 8),
        Row(mainAxisAlignment: MainAxisAlignment.center, children: [
          FilledButton.icon(
            style: FilledButton.styleFrom(
              backgroundColor: const Color(0xFF1877f2),
              padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 10),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
              textStyle: const TextStyle(fontFamily: 'Cairo', fontSize: 13, fontWeight: FontWeight.w700),
            ),
            onPressed: () {},
            icon: const Text('📘', style: TextStyle(fontSize: 16)),
            label: const Text('صفحتنا على فيسبوك'),
          ),
        ]),
        const SizedBox(height: 12),
      ],
    ),
  );
}

// ══════════════════════════════════════════════════════════
//  SHARED WIDGETS
// ══════════════════════════════════════════════════════════
class _LogoWidget extends StatelessWidget {
  const _LogoWidget();
  @override
  Widget build(BuildContext context) => Padding(
    padding: const EdgeInsets.symmetric(horizontal: 12),
    child: Row(children: [
      Container(
        width: 36, height: 36,
        decoration: BoxDecoration(
          gradient: const LinearGradient(colors: [C.tealMid, C.tealLight]),
          borderRadius: BorderRadius.circular(10),
          boxShadow: [BoxShadow(color: C.tealMid.withOpacity(.3), blurRadius: 8)],
        ),
        child: const Center(child: Text('🏥', style: TextStyle(fontSize: 17))),
      ),
      const SizedBox(width: 8),
      Column(mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start, children: const [
        Text('عاشور زيان',
            style: TextStyle(fontSize: 13, fontWeight: FontWeight.w700, color: C.tealDeep)),
        Text('المؤسسة الاستشفائية',
            style: TextStyle(fontSize: 9, color: C.textMuted)),
      ]),
    ]),
  );
}

class _PulseDot extends StatefulWidget {
  @override
  State<_PulseDot> createState() => _PulseDotState();
}

class _PulseDotState extends State<_PulseDot> with SingleTickerProviderStateMixin {
  late AnimationController _c;
  late Animation<double> _a;
  @override
  void initState() {
    super.initState();
    _c = AnimationController(vsync: this, duration: const Duration(milliseconds: 1500))..repeat(reverse: true);
    _a = Tween<double>(begin: .8, end: 1.4).animate(CurvedAnimation(parent: _c, curve: Curves.easeInOut));
  }
  @override
  void dispose() { _c.dispose(); super.dispose(); }
  @override
  Widget build(BuildContext context) => ScaleTransition(
    scale: _a,
    child: Container(
      width: 8, height: 8,
      decoration: BoxDecoration(
        color: C.red, shape: BoxShape.circle,
        boxShadow: [BoxShadow(color: C.red.withOpacity(.5), blurRadius: 6)],
      ),
    ),
  );
}

class _GoldButton extends StatelessWidget {
  final String label;
  final IconData icon;
  final VoidCallback onTap;
  const _GoldButton({required this.label, required this.icon, required this.onTap});
  @override
  Widget build(BuildContext context) => Material(
    color: C.gold,
    borderRadius: BorderRadius.circular(8),
    child: InkWell(
      borderRadius: BorderRadius.circular(8),
      onTap: onTap,
      child: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 6),
        child: Row(children: [
          Icon(icon, size: 13, color: C.tealDeep),
          const SizedBox(width: 4),
          Text(label, style: const TextStyle(color: C.tealDeep, fontSize: 11, fontWeight: FontWeight.w700)),
        ]),
      ),
    ),
  );
}

class _SecHeader extends StatelessWidget {
  final String eyebrow, title;
  const _SecHeader({required this.eyebrow, required this.title});
  @override
  Widget build(BuildContext context) => Padding(
    padding: const EdgeInsets.fromLTRB(16, 28, 16, 6),
    child: Column(children: [
      Container(
        padding: const EdgeInsets.symmetric(horizontal: 14, vertical: 4),
        decoration: BoxDecoration(
          color: C.tealLight.withOpacity(.09),
          borderRadius: BorderRadius.circular(20),
        ),
        child: Text(eyebrow,
            style: const TextStyle(fontSize: 11, fontWeight: FontWeight.w700,
                letterSpacing: 1.5, color: C.tealLight)),
      ),
      const SizedBox(height: 10),
      Text(title, style: const TextStyle(
          fontFamily: 'Amiri', fontSize: 22, fontWeight: FontWeight.w700, color: C.tealDeep)),
      const SizedBox(height: 10),
      Container(
        width: 50, height: 3,
        decoration: BoxDecoration(
          gradient: const LinearGradient(colors: [C.gold, C.tealLight]),
          borderRadius: BorderRadius.circular(2),
        ),
      ),
      const SizedBox(height: 14),
    ]),
  );
}