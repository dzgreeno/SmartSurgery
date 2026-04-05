import type { CapacitorConfig } from '@capacitor/cli';

const config: CapacitorConfig = {
  appId: 'com.smartsurgery.app',
  appName: 'SmartSurgery',
  webDir: 'www',
  server: {
    url: 'https://smart-surgery.vercel.app',
    cleartext: true
  }
};

export default config;
