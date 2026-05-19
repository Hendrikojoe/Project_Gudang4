<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\KategoriModel;
use App\Models\SubItemModel;

class BarangController extends BaseController
{
    protected $barangModel;
    protected $transaksiModel;
    protected $kategoriModel;
    protected $subItemModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->transaksiModel = new TransaksiModel();
        $this->kategoriModel = new KategoriModel();
        $this->subItemModel = new SubItemModel();
    }

    private function getViewPath($viewName)
    {
        $role = session()->get('role');
        if ($role === 'admin') {
            return "admin/barang/{$viewName}";
        }
        return "user/barang/{$viewName}";
    }

    public function index()
    {
        $selectedKategori = $this->request->getGet('kategori');
        $selectedStatus = $this->request->getGet('status_kondisi'); // ✅ TAMBAHKAN INI
        
        // Filter berdasarkan kategori dan status
        $barang = $this->barangModel->getBarangWithKategori();
        
        // Filter berdasarkan kategori
        if (!empty($selectedKategori)) {
            $barang = array_filter($barang, function($item) use ($selectedKategori) {
                return $item['kategori_id'] == $selectedKategori;
            });
        }
        
        // Filter berdasarkan status kondisi
        if (!empty($selectedStatus)) {
            $barang = array_filter($barang, function($item) use ($selectedStatus) {
                return ($item['kondisi'] ?? 'baik') == $selectedStatus;
            });
        }
        
        $totalMasukGlobal = 0;
        $totalKeluarGlobal = 0;
        $subItems = [];
        
        foreach ($barang as &$b) {
            // AMBIL TRANSAKSI MASUK TERAKHIR
            $lastMasuk = $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->orderBy('id', 'DESC')
                ->first();
            
            // AMBIL TRANSAKSI KELUAR TERAKHIR
            $lastKeluar = $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->orderBy('id', 'DESC')
                ->first();
            
            // Tampilkan jumlah transaksi terakhir
            $b['total_masuk'] = $lastMasuk['jumlah'] ?? 0;
            $b['total_keluar'] = $lastKeluar['jumlah'] ?? 0;
            
            // Untuk summary cards (total keseluruhan)
            $totalMasukGlobal += $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
                
            $totalKeluarGlobal += $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
            
            $subItems[$b['id']] = $this->subItemModel->getByBarang($b['id']);
            
            if (!empty($subItems[$b['id']])) {
                foreach ($subItems[$b['id']] as &$sub) {
                    $lastSubMasuk = $this->transaksiModel
                        ->where('id_sub_item', $sub['id'])
                        ->where('jenis_transaksi', 'masuk')
                        ->orderBy('id', 'DESC')
                        ->first();
                        
                    $lastSubKeluar = $this->transaksiModel
                        ->where('id_sub_item', $sub['id'])
                        ->where('jenis_transaksi', 'keluar')
                        ->orderBy('id', 'DESC')
                        ->first();
                        
                    $sub['total_masuk'] = $lastSubMasuk['jumlah'] ?? 0;
                    $sub['total_keluar'] = $lastSubKeluar['jumlah'] ?? 0;
                }
            }
        }
        
        $totalStok = array_sum(array_column($barang, 'stok'));
        
        $kategoriList = $this->kategoriModel->findAll();
        
        usort($barang, function($a, $b) {
            return ($a['kategori_id'] ?? 0) <=> ($b['kategori_id'] ?? 0);
        });
        
        $data = [
            'title' => 'Data Barang',
            'barang' => $barang,
            'totalMasuk' => $totalMasukGlobal,
            'totalKeluar' => $totalKeluarGlobal,
            'totalStok' => $totalStok,
            'subItems' => $subItems,
            'kategoriList' => $kategoriList,
            'selectedKategori' => $selectedKategori,
            'selectedStatus' => $selectedStatus 
        ];
        
        return view($this->getViewPath('index'), $data);
    }
    
    public function kategori($id)
    {
        $selectedStatus = $this->request->getGet('status_kondisi'); 
        $barang = $this->barangModel->getByKategori($id);
        
        // Filter berdasarkan status kondisi
        if (!empty($selectedStatus)) {
            $barang = array_filter($barang, function($item) use ($selectedStatus) {
                return ($item['kondisi'] ?? 'baik') == $selectedStatus;
            });
        }
        
        $totalMasukGlobal = 0;
        $totalKeluarGlobal = 0;
        $subItems = [];
        
        foreach ($barang as &$b) {
            $lastMasuk = $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->orderBy('id', 'DESC')
                ->first();
            
            $lastKeluar = $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->orderBy('id', 'DESC')
                ->first();
            
            $b['total_masuk'] = $lastMasuk['jumlah'] ?? 0;
            $b['total_keluar'] = $lastKeluar['jumlah'] ?? 0;
            
            $totalMasukGlobal += $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
                
            $totalKeluarGlobal += $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
            
            $subItems[$b['id']] = $this->subItemModel->getByBarang($b['id']);
            
            if (!empty($subItems[$b['id']])) {
                foreach ($subItems[$b['id']] as &$sub) {
                    $lastSubMasuk = $this->transaksiModel
                        ->where('id_sub_item', $sub['id'])
                        ->where('jenis_transaksi', 'masuk')
                        ->orderBy('id', 'DESC')
                        ->first();
                        
                    $lastSubKeluar = $this->transaksiModel
                        ->where('id_sub_item', $sub['id'])
                        ->where('jenis_transaksi', 'keluar')
                        ->orderBy('id', 'DESC')
                        ->first();
                        
                    $sub['total_masuk'] = $lastSubMasuk['jumlah'] ?? 0;
                    $sub['total_keluar'] = $lastSubKeluar['jumlah'] ?? 0;
                }
            }
        }
        
        $totalStok = array_sum(array_column($barang, 'stok'));
        $kategoriList = $this->kategoriModel->findAll();
        $kategoriTerpilih = $this->kategoriModel->find($id);
        
        $data = [
            'title' => 'Barang - ' . ($kategoriTerpilih['nama'] ?? 'Kategori'),
            'barang' => $barang,
            'totalMasuk' => $totalMasukGlobal,
            'totalKeluar' => $totalKeluarGlobal,
            'totalStok' => $totalStok,
            'subItems' => $subItems,
            'kategoriList' => $kategoriList,
            'selectedKategori' => $id,
            'selectedStatus' => $selectedStatus  // ✅ TAMBAHKAN INI
        ];
        
        return view($this->getViewPath('index'), $data);
    }

    public function create()
    {
        $kategori = $this->kategoriModel->findAll();

        $data = [
            'title' => 'Tambah Barang',
            'kategori' => $kategori,
            'kategoriList' => $kategori,
            'kondisi' => 'baik'
        ];

        return view($this->getViewPath('create'), $data);
    }

    public function store()
    {
        $rules = [
            'kategori_id' => 'required|numeric',
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'stok' => 'required|numeric|greater_than_equal_to[0]',
            'satuan' => 'required|in_list[pcs,box,kotak,unit,buah,pack,dus,liter,kg,gram,meter,lembar,batang,botol,kantong]',
            'kondisi' => 'required|in_list[baik,perbaikan,perawatan,standby]',
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[gambar,2048]',
                'is_image[gambar]'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'kategori_id' => $this->request->getPost('kategori_id'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'kondisi' => $this->request->getPost('kondisi') ?? 'baik'
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/barang/', $newName);
            $data['gambar'] = $newName;
        }

        $this->barangModel->save($data);

        log_activity('Menambahkan barang: ' . $data['nama_barang']);

        return redirect()->to('/barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = $this->barangModel->find($id);
        $kategori = $this->kategoriModel->findAll();

        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Barang',
            'barang' => $barang,
            'kategori' => $kategori,
            'kondisi' => $barang['kondisi'] ?? 'baik'
        ];

        return view($this->getViewPath('edit'), $data);
    }

    public function update($id)
    {
        $rules = [
            'kategori_id' => 'required|numeric',
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'stok' => 'required|numeric|greater_than_equal_to[0]',
            'satuan' => 'required|in_list[pcs,box,kotak,unit,buah,pack,dus,liter,kg,gram,meter,lembar,batang,botol,kantong]',
            'kondisi' => 'required|in_list[baik,perbaikan,perawatan,standby]',
            'gambar' => [
                'mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[gambar,2048]',
                'is_image[gambar]'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $barangLama = $this->barangModel->find($id);

        $data = [
            'kategori_id' => $this->request->getPost('kategori_id'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'kondisi' => $this->request->getPost('kondisi') ?? 'baik'
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!empty($barangLama['gambar']) && file_exists(FCPATH . 'uploads/barang/' . $barangLama['gambar'])) {
                unlink(FCPATH . 'uploads/barang/' . $barangLama['gambar']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/barang/', $newName);
            $data['gambar'] = $newName;
        }

        if ($this->request->getPost('hapus_gambar') == '1') {
            if (!empty($barangLama['gambar']) && file_exists(FCPATH . 'uploads/barang/' . $barangLama['gambar'])) {
                unlink(FCPATH . 'uploads/barang/' . $barangLama['gambar']);
            }
            $data['gambar'] = null;
        }

        $this->barangModel->update($id, $data);

        log_activity('Mengedit barang: ' . $data['nama_barang']);

        return redirect()->to('/barang')->with('success', 'Barang berhasil diupdate');
    }

    public function delete($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $this->transaksiModel->where('id_barang', $id)->delete();
        
        $this->subItemModel->where('barang_id', $id)->delete();

        if (!empty($barang['gambar']) && file_exists(FCPATH . 'uploads/barang/' . $barang['gambar'])) {
            unlink(FCPATH . 'uploads/barang/' . $barang['gambar']);
        }

        $this->barangModel->delete($id);

        log_activity('Menghapus barang: ' . $barang['nama_barang']);

        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus');
    }

    public function masuk($id)
    {
        $jumlah = (int)$this->request->getPost('jumlah');

        if (!$this->validate(['jumlah' => 'required|numeric|greater_than[0]'])) {
            return redirect()->back()->withInput()->with('error', 'Jumlah harus diisi dan lebih dari 0');
        }

        // Tambah stok
        $this->barangModel->tambahStok($id, $jumlah);

        // Simpan transaksi MASUK (TANPA satuan)
        $this->transaksiModel->save([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'masuk',
            'id_user' => session()->get('id'), 
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        log_activity('Barang masuk: +' . $jumlah . ' (ID: ' . $id . ')');

        return redirect()->to('/barang')->with('success', 'Barang masuk berhasil dicatat (+' . $jumlah . ')');
    }

    public function keluar($id)
    {
        $jumlah = (int)$this->request->getPost('jumlah');

        if (!$this->validate(['jumlah' => 'required|numeric|greater_than[0]'])) {
            return redirect()->back()->withInput()->with('error', 'Jumlah harus diisi dan lebih dari 0');
        }

        if (!$this->barangModel->kurangiStok($id, $jumlah)) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        // Simpan transaksi KELUAR (TANPA satuan)
        $this->transaksiModel->save([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'keluar',
            'id_user' => session()->get('id'), 
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        log_activity('Barang keluar: -' . $jumlah . ' (ID: ' . $id . ')');

        return redirect()->to('/barang')->with('success', 'Barang keluar berhasil dicatat (-' . $jumlah . ')');
    }

    public function detail($id)
    {
        $barang = $this->barangModel->getDetail($id);

        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $totalMasuk = $this->transaksiModel
            ->where('id_barang', $id)
            ->where('jenis_transaksi', 'masuk')
            ->selectSum('jumlah')
            ->first()['jumlah'] ?? 0;

        $totalKeluar = $this->transaksiModel
            ->where('id_barang', $id)
            ->where('jenis_transaksi', 'keluar')
            ->selectSum('jumlah')
            ->first()['jumlah'] ?? 0;

        $transaksi = $this->transaksiModel
            ->where('id_barang', $id)
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        $stok = $barang['stok'];
        $statusStok = ($stok <= 0) ? 'Habis' : (($stok <= 5) ? 'Kritis' : (($stok <= 10) ? 'Menipis' : 'Aman'));

        $data = [
            'title' => 'Detail Barang',
            'barang' => $barang,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'transaksi' => $transaksi,
            'statusStok' => $statusStok,
            'kondisi' => $barang['kondisi'] ?? 'baik'
        ];

        return view($this->getViewPath('detail'), $data);
    }

    // ======================= SUB-ITEM / VARIAN =======================
    public function subItem($barang_id)
    {
        $barang = $this->barangModel->find($barang_id);
        if (!$barang) return redirect()->back()->with('error', 'Barang tidak ditemukan');

        $subItems = $this->subItemModel->getByBarang($barang_id);
        
        foreach ($subItems as &$sub) {
            $lastSubMasuk = $this->transaksiModel
                ->where('id_sub_item', $sub['id'])
                ->where('jenis_transaksi', 'masuk')
                ->orderBy('id', 'DESC')
                ->first();
                
            $lastSubKeluar = $this->transaksiModel
                ->where('id_sub_item', $sub['id'])
                ->where('jenis_transaksi', 'keluar')
                ->orderBy('id', 'DESC')
                ->first();
                
            $sub['total_masuk'] = $lastSubMasuk['jumlah'] ?? 0;
            $sub['total_keluar'] = $lastSubKeluar['jumlah'] ?? 0;
        }

        $data = [
            'title' => 'Varian / Merk: ' . $barang['nama_barang'],
            'barang' => $barang,
            'subItems' => $subItems
        ];

        return view($this->getViewPath('sub_item/index'), $data);
    }

    public function subItemCreate($barang_id)
    {
        $barang = $this->barangModel->find($barang_id);
        if (!$barang) return redirect()->back()->with('error', 'Barang tidak ditemukan');

        $data = [
            'title' => 'Tambah Varian / Merk',
            'barang' => $barang
        ];

        return view($this->getViewPath('sub_item/create'), $data);
    }

    public function subItemStore($barang_id)
    {
        $rules = [
            'nama' => 'required|min_length[1]|max_length[100]',
            'stok' => 'required|numeric|greater_than_equal_to[0]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->subItemModel->save([
            'barang_id' => $barang_id,
            'nama' => $this->request->getPost('nama'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang/sub-item/' . $barang_id)->with('success', 'Varian berhasil ditambahkan');
    }

    public function subItemEdit($id)
    {
        $sub = $this->subItemModel->getById($id);
        if (!$sub) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }
        
        $barang = $this->barangModel->find($sub['barang_id']);

        $data = [
            'title' => 'Edit Varian / Merk',
            'barang' => $barang,
            'subItem' => $sub
        ];

        return view($this->getViewPath('sub_item/edit'), $data);
    }

    public function subItemUpdate($id)
    {
        $sub = $this->subItemModel->getById($id);
        if (!$sub) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }

        $rules = [
            'nama' => 'required|min_length[1]|max_length[100]',
            'stok' => 'required|numeric|greater_than_equal_to[0]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->subItemModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang/sub-item/' . $sub['barang_id'])->with('success', 'Varian berhasil diupdate');
    }

    public function subItemDelete($id)
    {
        $sub = $this->subItemModel->getById($id);
        if (!$sub) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }
        
        $barang_id = $sub['barang_id'];
        
        // Hapus transaksi yang terkait dengan sub-item ini
        $this->transaksiModel->where('id_sub_item', $id)->delete();

        $this->subItemModel->delete($id);

        return redirect()->to('/barang/sub-item/' . $barang_id)->with('success', 'Varian berhasil dihapus');
    }

    public function subItemMasuk($id)
    {
        $jumlah = (int)$this->request->getPost('jumlah');
        
        $rules = ['jumlah' => 'required|numeric|greater_than[0]'];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }
        
        $subItem = $this->subItemModel->find($id);
        if (!$subItem) {
            return redirect()->back()->with('error', 'Sub item tidak ditemukan');
        }
        
        // Tambah stok sub-item
        $this->subItemModel->addStock($id, $jumlah);
        
        // Simpan transaksi untuk sub-item (TANPA satuan)
        $this->transaksiModel->save([
            'id_barang' => $subItem['barang_id'],
            'id_sub_item' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'masuk',
            'id_user' => session()->get('id'),
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Stok varian berhasil ditambah (+' . $jumlah . ')');
    }

    public function subItemKeluar($id)
    {
        $jumlah = (int)$this->request->getPost('jumlah');
        
        $rules = ['jumlah' => 'required|numeric|greater_than[0]'];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }
        
        $subItem = $this->subItemModel->find($id);
        if (!$subItem) {
            return redirect()->back()->with('error', 'Sub item tidak ditemukan');
        }
        
        // Kurangi stok sub-item
        $result = $this->subItemModel->reduceStock($id, $jumlah);
        
        if (!$result) {
            return redirect()->back()->with('error', 'Stok varian tidak mencukupi!');
        }
        
        // Simpan transaksi untuk sub-item (TANPA satuan)
        $this->transaksiModel->save([
            'id_barang' => $subItem['barang_id'],
            'id_sub_item' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'keluar',
            'id_user' => session()->get('id'),
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Stok varian berhasil dikurangi (-' . $jumlah . ')');
    }

    // ======================= MAINTENANCE BARANG =======================
    public function maintenance($id)
    {
        $barang = $this->barangModel->getDetail($id);
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $data = [
            'title' => 'Maintenance Barang',
            'barang' => $barang,
            'jumlah_baik' => (int)($barang['stok'] ?? 0),
            'jumlah_maintenance' => (int)($barang['jumlah_dalam_maintenance'] ?? 0),
            'jumlah_rusak' => (int)($barang['jumlah_rusak'] ?? 0)
        ];

        return view($this->getViewPath('maintenance'), $data);
    }

    public function updateMaintenance($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $jumlahBaik = (int)($this->request->getPost('jumlah_baik') ?? 0);
        $jumlahMaintenance = (int)($this->request->getPost('jumlah_maintenance') ?? 0);
        $jumlahRusak = (int)($this->request->getPost('jumlah_rusak') ?? 0);
        
        $total = $jumlahBaik + $jumlahMaintenance + $jumlahRusak;
        $totalStokAwal = (int)($barang['stok'] ?? 0) + (int)($barang['jumlah_dalam_maintenance'] ?? 0) + (int)($barang['jumlah_rusak'] ?? 0);
        
        if ($total != $totalStokAwal) {
            return redirect()->back()->withInput()->with('error', 'Total jumlah (' . $total . ') harus sama dengan total stok fisik (' . $totalStokAwal . ')!');
        }

        $rules = [
            'keterangan_maintenance' => 'permit_empty|max_length[500]',
            'tipe_barang' => 'required|in_list[baru,bekas]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'stok' => $jumlahBaik,
            'jumlah_dalam_maintenance' => $jumlahMaintenance,
            'jumlah_rusak' => $jumlahRusak,
            'keterangan_maintenance' => $this->request->getPost('keterangan_maintenance'),
            'tipe_barang' => $this->request->getPost('tipe_barang')
        ];

        $this->barangModel->update($id, $data);

        log_activity('Update maintenance barang ID: ' . $id . ' - Baik: ' . $jumlahBaik . ', Maintenance: ' . $jumlahMaintenance . ', Rusak: ' . $jumlahRusak);

        return redirect()->to('/barang')->with('success', 'Status maintenance barang berhasil diupdate!');
    }

    public function kembalikanMaintenance($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $jumlah = (int)($this->request->getPost('jumlah') ?? 0);
        
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }
        
        $jumlahMaintenance = (int)($barang['jumlah_dalam_maintenance'] ?? 0);
        
        if ($jumlah > $jumlahMaintenance) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok maintenance yang tersedia!');
        }
        
        $stokBaru = (int)($barang['stok'] ?? 0) + $jumlah;
        $jumlahMaintenanceBaru = $jumlahMaintenance - $jumlah;
        
        $data = [
            'stok' => $stokBaru,
            'jumlah_dalam_maintenance' => $jumlahMaintenanceBaru
        ];
        
        $this->barangModel->update($id, $data);
        
        $this->transaksiModel->save([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'masuk',
            'id_user' => session()->get('id'),
            'tanggal' => date('Y-m-d H:i:s'),
            'keterangan' => 'Barang selesai maintenance, dikembalikan ke stok'
        ]);
        
        log_activity('Kembalikan barang maintenance ID: ' . $id . ' - Jumlah: ' . $jumlah);
        
        return redirect()->to('/barang')->with('success', $jumlah . ' ' . $barang['satuan'] . ' barang berhasil dikembalikan dari maintenance!');
    }

    public function perbaikiRusak($id)
    {
        $barang = $this->barangModel->find($id);
        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        $jumlah = (int)($this->request->getPost('jumlah') ?? 0);
        $tujuan = $this->request->getPost('tujuan');
        
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }
        
        $jumlahRusak = (int)($barang['jumlah_rusak'] ?? 0);
        
        if ($jumlah > $jumlahRusak) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok rusak yang tersedia!');
        }
        
        $jumlahRusakBaru = $jumlahRusak - $jumlah;
        
        if ($tujuan == 'baik') {
            $stokBaru = (int)($barang['stok'] ?? 0) + $jumlah;
            $data = [
                'stok' => $stokBaru,
                'jumlah_rusak' => $jumlahRusakBaru
            ];
            $keterangan = 'Barang rusak berhasil diperbaiki, ditambahkan ke stok';
        } else {
            $jumlahMaintenanceBaru = (int)($barang['jumlah_dalam_maintenance'] ?? 0) + $jumlah;
            $data = [
                'jumlah_dalam_maintenance' => $jumlahMaintenanceBaru,
                'jumlah_rusak' => $jumlahRusakBaru
            ];
            $keterangan = 'Barang rusak dipindahkan ke maintenance untuk perawatan lanjutan';
        }
        
        $this->barangModel->update($id, $data);
        
        $this->transaksiModel->save([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'masuk',
            'id_user' => session()->get('id'),
            'tanggal' => date('Y-m-d H:i:s'),
            'keterangan' => $keterangan
        ]);
        
        log_activity('Perbaiki barang rusak ID: ' . $id . ' - Jumlah: ' . $jumlah . ' - Tujuan: ' . $tujuan);
        
        return redirect()->to('/barang')->with('success', $jumlah . ' ' . $barang['satuan'] . ' barang berhasil diperbaiki!');
    }
}