1. Input name peckage for corret output.
2. Create Config for IP Server target for access API Service.
3. Input gradle (Module:App)
	compile 'com.google.code.gson:gson:2.7'
	compile 'com.android.support:recyclerview-v7:25.0.0'
	compile 'com.android.support:cardview-v7:25.0.0'
	compile 'com.android.support:design:25.0.0'
	compile 'com.android.support:support-v4:25.3.1'
4. Input <uses-permision> in manifest
	<uses-permission android:name="android.permission.WRITE_EXTERNAL_STORAGE" />
	<uses-permission android:name="android.permission.READ_EXTERNAL_STORAGE" />
	<uses-permission android:name="android.permission.WRITE_INTERNAL_STORAGE" />
	<uses-permission android:name="android.permission.READ_INTERNAL_STORAGE" />
	<uses-permission android:name="android.permission.INTERNET" />
	<uses-permission android:name="android.permission.RECEIVE_BOOT_COMPLETED" />
5. Input declaration of Activity in manifest with format
	<activity
            android:name=".[Package_name].[Activity_name]"
            android:label="[Label Name for Activity]" />
