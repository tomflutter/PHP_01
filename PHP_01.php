<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; margin-bottom: 20px; }
        td { padding: 8px; }
        input, select { padding: 5px; width: 200px; }
        .error { color: red; font-size: 12px; margin-top: 5px; }
        .success { color: green; margin-bottom: 20px; }
        .hidden { display: none; }
    </style>
</head>
<body>
    <h2>Form Data Diri</h2>
    
    <div id="success-message" class="success hidden">Form berhasil disubmit!</div>
    
    <form id="data-form" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama" id="nama">
                    <div id="nama-error" class="error hidden"></div>
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat" id="alamat">
                    <div id="alamat-error" class="error hidden"></div>
                </td>
            </tr>

            <tr>
                <td>Nomor Telepon</td>
                <td>
                    <input type="text" name="nomor_telepon" id="nomor_telepon">
                    <div id="nomor-telepon-error" class="error hidden"></div>
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div id="jenis-kelamin-error" class="error hidden"></div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>

    <script>
        document.getElementById('data-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
        
            document.querySelectorAll('.error').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            

            const nama = document.getElementById('nama').value.trim();
            const alamat = document.getElementById('alamat').value.trim();
            const nomorTelepon = document.getElementById('nomor_telepon').value.trim();
            const jenisKelamin = document.getElementById('jenis_kelamin').value;
            
            let isValid = true;
            
            
            if (!nama) {
                showError('nama-error', 'Nama tidak boleh kosong');
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(nama)) {
                showError('nama-error', 'Nama hanya boleh berisi huruf dan spasi');
                isValid = false;
            }
            
            
            if (!alamat) {
                showError('alamat-error', 'Alamat tidak boleh kosong');
                isValid = false;
            }
            
            
            if (!nomorTelepon) {
                showError('nomor-telepon-error', 'Nomor telepon tidak boleh kosong');
                isValid = false;
            } else if (!/^[0-9]+$/.test(nomorTelepon)) {
                showError('nomor-telepon-error', 'Nomor telepon hanya boleh berisi angka');
                isValid = false;
            }
            
          
            if (!jenisKelamin) {
                showError('jenis-kelamin-error', 'Jenis kelamin harus dipilih');
                isValid = false;
            }
            
            
            if (isValid) {
                document.getElementById('success-message').classList.remove('hidden');
                
                this.reset();
                
                
                setTimeout(() => {
                    document.getElementById('success-message').classList.add('hidden');
                }, 3000);
            }
        });
        
        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    </script>
</body>
</html>