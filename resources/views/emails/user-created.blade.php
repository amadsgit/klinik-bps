<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pemberitahuan Akun Klinik BPS</title>
</head>

<body style="margin:0; padding:0; background:#f3f4f6; font-family:Arial, sans-serif;">

    <!-- WRAPPER -->
    <div
        style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08);">

        <!-- HEADER -->
        <div style="background:linear-gradient(135deg,#2563eb,#1e40af); padding:24px; color:#fff; text-align:center;">
            <h2 style="margin:0; font-size:20px; letter-spacing:0.5px;">
                Klinik BPS Bidan Rokayah
            </h2>
            <p style="margin:6px 0 0; font-size:13px; opacity:0.9;">
                Cibuluh Kel.Parung Subang
            </p>
        </div>

        <!-- CONTENT -->
        <div style="padding:24px; color:#111827;">

            <p style="font-size:14px; margin-bottom:8px;">
                Halo <b>{{ $user->name }}</b>,
            </p>

            <p style="font-size:14px; line-height:1.6; color:#374151;">
                Akun Anda telah berhasil dibuat di sistem Klinik BPS Bidan Rokayah.
                Berikut detail akun Anda:
            </p>

            <!-- INFO CARD -->
            <div
                style="margin-top:20px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:16px;">

                <div style="margin-bottom:10px;">
                    <span style="font-size:12px; color:#6b7280;">Nama</span>
                    <div style="font-size:14px; font-weight:600;">{{ $user->name }}</div>
                </div>

                <div style="margin-bottom:10px;">
                    <span style="font-size:12px; color:#6b7280;">Email</span>
                    <div style="font-size:14px;">{{ $user->email }}</div>
                </div>

                <div style="margin-bottom:10px;">
                    <span style="font-size:12px; color:#6b7280;">Password</span>
                    <div
                        style="font-size:14px; font-family:monospace; background:#fff; padding:6px 10px; border-radius:8px; display:inline-block;">
                        {{ $password }}
                    </div>
                </div>

                <div>
                    <span style="font-size:12px; color:#6b7280;">Role</span><br>
                    <span
                        style="display:inline-block; margin-top:4px; padding:4px 10px; font-size:12px; border-radius:999px; background:#dbeafe; color:#1d4ed8;">
                        {{ $user->role->nama ?? '-' }}
                    </span>
                </div>

            </div>

            <!-- WARNING -->
            <div
                style="margin-top:20px; padding:12px; border-left:4px solid #ef4444; background:#fef2f2; border-radius:8px;">
                <p style="margin:0; font-size:13px; color:#b91c1c;">
                    ⚠ Harap segera login dan ubah password Anda demi keamanan akun.
                </p>
            </div>

            <!-- CTA -->
            <div style="margin-top:24px; text-align:center;">
                <a href="{{ url('#') }}"
                    style="display:inline-block; padding:10px 18px; background:#2563eb; color:#fff; text-decoration:none; border-radius:10px; font-size:14px;">
                    Login ke Sistem
                </a>
            </div>

        </div>

        <!-- FOOTER -->
        <div style="padding:14px; text-align:center; font-size:11px; color:#9ca3af; background:#f9fafb;">
            © {{ date('Y') }} Klinik BPS Bidan Rokayah • Sistem Informasi RME • Cibuluh Kel.Parung Subang
        </div>

    </div>

</body>

</html>