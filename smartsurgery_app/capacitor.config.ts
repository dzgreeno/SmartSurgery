import type { CapacitorConfig } from '@capacitor/cli';

const config: CapacitorConfig = {
  appId: 'com.smartsurgery.app',
  appName: 'SmartSurgery',
  webDir: 'www',
  server: {
    url: 'https://smart-surgery.vercel.app',
    cleartext: true
  },
  plugins: {
    SplashScreen: {
      backgroundColor: '#0d1117',
      launchAutoHide: true,
      showSpinner: true,
      spinnerColor: '#2dd4bf',
      splashFullScreen: false,
      splashImmersive: false
    },
    StatusBar: {
      style: 'DARK',
      backgroundColor: '#0d1117'
    }
  }
};

export default config;
