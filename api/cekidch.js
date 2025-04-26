module.exports = async (req, res) => {
    if (req.method === 'POST') {
        const { link } = req.body;
        
        if (!link) {
            return res.status(400).json({ error: 'Link channel WhatsApp diperlukan' });
        }

        try {
            // Logika untuk memproses link dan mendapatkan ID
            // Di sini Anda bisa menggunakan package atau API lain untuk memeriksa ID Channel WhatsApp

            // Contoh respons jika berhasil
            res.status(200).json({
                name: 'Contoh Channel',
                id: '0029Vafs40K4dTnIXMqfQa2Q'
            });

        } catch (error) {
            return res.status(500).json({ error: 'Terjadi kesalahan saat memeriksa channel.' });
        }
    } else {
        res.status(405).json({ error: 'Metode HTTP tidak diizinkan' });
    }
};
