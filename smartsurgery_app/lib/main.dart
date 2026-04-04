import 'package:flutter/material.dart';
import 'package:firebase_core/firebase_core.dart';
import 'firebase_options.dart';
import 'pages/home_page.dart'; // استورد ملفك الكبير اللي فيه RootScreen

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(
    options: DefaultFirebaseOptions.currentPlatform,
  );
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'مستشفى عاشور زيان',
      theme: ThemeData(fontFamily: 'Cairo', primaryColor: const Color(0xFF0f4c5c)),
      home: const RootScreen(), // هنا كل شي يبدأ من RootScreen
    );
  }
}