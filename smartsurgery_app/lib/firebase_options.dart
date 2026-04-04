// ignore_for_file: constant_identifier_names
import 'package:firebase_core/firebase_core.dart' show FirebaseOptions;
import 'package:flutter/foundation.dart'
    show defaultTargetPlatform, kIsWeb, TargetPlatform;

class DefaultFirebaseOptions {
  static FirebaseOptions get currentPlatform {
    if (kIsWeb) {
      return web;
    }
    switch (defaultTargetPlatform) {
      case TargetPlatform.windows:
        return windows;
      case TargetPlatform.android:
        throw UnsupportedError(
          'DefaultFirebaseOptions not configured for Android yet.',
        );
      case TargetPlatform.iOS:
        throw UnsupportedError(
          'DefaultFirebaseOptions not configured for iOS yet.',
        );
      case TargetPlatform.macOS:
        throw UnsupportedError(
          'DefaultFirebaseOptions not configured for macOS yet.',
        );
      case TargetPlatform.linux:
        throw UnsupportedError(
          'DefaultFirebaseOptions not configured for Linux yet.',
        );
      default:
        throw UnsupportedError('Unknown platform');
    }
  }

  // Web configuration
  static const FirebaseOptions web = FirebaseOptions(
    apiKey: 'AIzaSyDdOfK6TB7zf5p_jN__8Iucu8lusQYn7nE',
    authDomain: 'smartsurgery.firebaseapp.com',
    projectId: 'smartsurgery',
    storageBucket: 'smartsurgery.firebasestorage.app',
    messagingSenderId: '181325973586',
    appId: '1:181325973586:web:634f40341f3846e4c7f78b',
    measurementId: 'G-985SQLL88Z',
  );

  // Windows configuration
  static const FirebaseOptions windows = FirebaseOptions(
    apiKey: 'AIzaSyDdOfK6TB7zf5p_jN__8Iucu8lusQYn7nE',
    authDomain: 'smartsurgery.firebaseapp.com',
    projectId: 'smartsurgery',
    storageBucket: 'smartsurgery.firebasestorage.app',
    messagingSenderId: '181325973586',
    appId: '1:181325973586:web:634f40341f3846e4c7f78b',
    measurementId: 'G-985SQLL88Z',
  );
}