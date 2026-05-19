<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\SubItemModel;

class SubItemController extends BaseController
{
    protected $barangModel;
    protected $subItemModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->subItemModel = new SubItemModel();
    }

    // ======================= LIST SUB-ITEM =======================
    public function index($barang_id)
    {
        $barang = $this->barangModel->find($barang_id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $subItems = $this->subItemModel->getByBarang($barang_id);

        return view('barang/sub_item/index', [
            'title' => 'Sub-Item / Varian Barang',
            'barang' => $barang,
            'subItems' => $subItems
        ]);
    }

    // ======================= CREATE =======================
    public function create($barang_id)
    {
        $barang = $this->barangModel->find($barang_id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        return view('barang/sub_item/create', [
            'title' => 'Tambah Varian/ Merk',
            'barang' => $barang
        ]);
    }

    public function store($barang_id)
    {
        $barang = $this->barangModel->find($barang_id);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        $nama = $this->request->getPost('nama');
        $stok = (int) $this->request->getPost('stok');

        if (!$nama) {
            return redirect()->back()->withInput()->with('errors', ['Nama varian wajib diisi']);
        }

        $this->subItemModel->save([
            'barang_id' => $barang_id,
            'nama' => $nama,
            'stok' => $stok,
            'total_masuk' => $stok,
            'total_keluar' => 0
        ]);

        return redirect()->to('/barang/sub-item/' . $barang_id)
                         ->with('success', 'Varian berhasil ditambahkan');
    }

    // ======================= EDIT =======================
    public function edit($id)
    {
        $subItem = $this->subItemModel->find($id);
        if (!$subItem) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }

        $barang = $this->barangModel->find($subItem['barang_id']);

        return view('barang/sub_item/edit', [
            'title' => 'Edit Varian / Merk',
            'subItem' => $subItem,
            'barang' => $barang
        ]);
    }

    public function update($id)
    {
        $subItem = $this->subItemModel->find($id);
        if (!$subItem) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }

        $nama = $this->request->getPost('nama');
        $stok = (int) $this->request->getPost('stok');

        if (!$nama) {
            return redirect()->back()->withInput()->with('errors', ['Nama varian wajib diisi']);
        }

        $this->subItemModel->update($id, [
            'nama' => $nama,
            'stok' => $stok
        ]);

        return redirect()->to('/barang/sub-item/' . $subItem['barang_id'])
                         ->with('success', 'Varian berhasil diupdate');
    }

    // ======================= DELETE =======================
    public function delete($id)
    {
        $subItem = $this->subItemModel->find($id);
        if (!$subItem) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }

        $barang_id = $subItem['barang_id'];
        $this->subItemModel->delete($id);

        return redirect()->to('/barang/sub-item/' . $barang_id)
                         ->with('success', 'Varian berhasil dihapus');
    }

    // ======================= STOCK MASUK =======================
    public function masuk($id)
    {
        $jumlah = (int) $this->request->getPost('jumlah');
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }

        if (!$this->subItemModel->addStock($id, $jumlah)) {
            return redirect()->back()->with('error', 'Varian tidak ditemukan');
        }

        return redirect()->back()->with('success', 'Stok berhasil ditambahkan');
    }

    // ======================= STOCK KELUAR =======================
    public function keluar($id)
    {
        $jumlah = (int) $this->request->getPost('jumlah');
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0');
        }

        if (!$this->subItemModel->reduceStock($id, $jumlah)) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi atau varian tidak ditemukan');
        }

        return redirect()->back()->with('success', 'Stok berhasil dikurangi');
    }
}