<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<style>
    /* Custom Styles */
    .filter-section {
        background: white;
        border-radius: 16px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        border: 1px solid #eef2f7;
    }
    
    .filter-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }
    
    .badge-masuk {
        background: linear-gradient(135deg, #28a745, #1e7e34);
        color: white;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    .badge-keluar {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: white;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    .table-transaksi {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-transaksi thead th {
        background: #f8f9fc;
        padding: 1rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        border-bottom: 2px solid #eef2f7;
    }
    
    .table-transaksi tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #eef2f7;
        color: #2c3e50;
    }
    
    .table-transaksi tbody tr:hover {
        background: #f8f9fc;
        transition: background 0.3s ease;
    }
    
    .jumlah-masuk {
        color: #28a745;
        font-weight: 700;
        font-size: 1rem;
    }
    
    .jumlah-keluar {
        color: #dc3545;
        font-weight: 700;
        font-size: 1rem;
    }
    
    .btn-action {
        padding: 0.35rem 0.7rem;
        border-radius: 8px;
        font-size: 0.75rem;
        transition: all 0.3s;
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
    }
    
    .card-header-custom {
        background: white;
        border-bottom: 1px solid #eef2f7;
        padding: 1.25rem 1.5rem;
        border-radius: 16px 16px 0 0;
    }
    
    .card-header-custom h5 {
        margin: 0;
        font-weight: 700;
        color: #1e3c72;
    }
    
    .stat-summary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        padding: 1rem 1.5rem;
        color: white;
        margin-bottom: 1.5rem;
    }
    
    .stat-summary-item {
        text-align: center;
    }
    
    .stat-summary-value {
        font-size: 1.8rem;
        font-weight: 800;
    }
    
    .stat-summary-label {
        font-size: 0.75rem;
        opacity: 0.9;
        text-transform: uppercase;
    }
    
    /* Pagination Styles */
    .pagination-custom {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin: 0;
        padding: 0;
        list-style: none;
        flex-wrap: wrap;
    }
    
    .pagination-custom .page-item {
        display: inline-block;
    }
    
    .pagination-custom .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 10px;
        border-radius: 8px;
        background: white;
        border: 1px solid #eef2f7;
        color: #1e3c72;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 0.85rem;
    }
    
    .pagination-custom .page-link:hover {
        background: #f8f9fc;
        border-color: #667eea;
        color: #667eea;
    }
    
    .pagination-custom .active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: #667eea;
        color: white;
    }
    
    .pagination-custom .disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }
    
    @media (max-width: 768px) {
        .table-transaksi thead {
            display: none;
        }
        
        .table-transaksi tbody td {
            display: block;
            text-align: right;
            padding: 0.5rem 1rem;
            border-bottom: none;
        }
        
        .table-transaksi tbody td::before {
            content: attr(data-label);
            float: left;
            font-weight: 700;
            color: #6c757d;
        }
        
        .table-transaksi tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #eef2f7;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .stat-summary-value {
            font-size: 1.2rem;
        }
        
        .pagination-custom .page-link {
            min-width: 30px;
            height: 30px;
            font-size: 0.75rem;
        }
    }
</style>

<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h4 class="fw-bold text-primary mb-1">
                <i class="fas fa-exchange-alt me-2"></i> Daftar Transaksi
            </h4>
            <p class="text-muted small mb-0">
                Kelola semua transaksi barang masuk dan keluar
            </p>
        </div>
    </div>

    <!-- Stat Summary Cards -->
    <div class="stat-summary">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3 mb-md-0">
                <div class="stat-summary-item">
                    <div class="stat-summary-value"><?= $totalTransaksi ?? 0 ?></div>
                    <div class="stat-summary-label">Total Transaksi</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3 mb-md-0">
                <div class="stat-summary-item">
                    <div class="stat-summary-value text-success"><?= $totalMasuk ?? 0 ?></div>
                    <div class="stat-summary-label">Barang Masuk</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-summary-item">
                    <div class="stat-summary-value text-danger"><?= $totalKeluar ?? 0 ?></div>
                    <div class="stat-summary-label">Barang Keluar</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-summary-item">
                    <div class="stat-summary-value"><?= $totalItemTerjual ?? 0 ?></div>
                    <div class="stat-summary-label">Total Item Terjual</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <div class="filter-label">Filter Jenis Transaksi</div>
                <select id="filterJenis" class="form-select form-select-sm">
                    <option value="all">Semua Transaksi</option>
                    <option value="masuk">Barang Masuk</option>
                    <option value="keluar">Barang Keluar</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="filter-label">Dari Tanggal</div>
                <input type="date" id="filterStartDate" class="form-control form-control-sm">
            </div>
            <div class="col-md-3">
                <div class="filter-label">Sampai Tanggal</div>
                <input type="date" id="filterEndDate" class="form-control form-control-sm">
            </div>
            <div class="col-md-3">
                <div class="filter-label">Cari</div>
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari barang...">
                    <button class="btn btn-primary btn-sm" id="btnReset">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header-custom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2 text-primary"></i> Data Transaksi
                </h5>
                <div>
                    <button class="btn btn-sm btn-outline-secondary" id="btnExport">
                        <i class="fas fa-file-excel me-1"></i> Export
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table-transaksi" id="transaksiTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal & Waktu</th>
                            <th>Jenis Transaksi</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Operator</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi) && is_array($transaksi)): ?>
                            <?php foreach ($transaksi as $t): ?>
                                <tr class="transaksi-row" data-jenis="<?= $t['jenis_transaksi'] ?>">
                                    <td data-label="ID">
                                        <span class="fw-bold">#<?= str_pad($t['id'], 6, '0', STR_PAD_LEFT) ?></span>
                                    </td>
                                    <td data-label="Tanggal & Waktu">
                                        <div class="fw-semibold"><?= date('d/m/Y', strtotime($t['tanggal'])) ?></div>
                                        <small class="text-muted"><?= date('H:i:s', strtotime($t['tanggal'])) ?></small>
                                    </td>
                                    <td data-label="Jenis Transaksi">
                                        <?php if ($t['jenis_transaksi'] == 'masuk'): ?>
                                            <span class="badge-masuk">
                                                <i class="fas fa-arrow-down me-1"></i> MASUK
                                            </span>
                                        <?php else: ?>
                                            <span class="badge-keluar">
                                                <i class="fas fa-arrow-up me-1"></i> KELUAR
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Kode Barang">
                                        <code><?= $t['kode_barang'] ?? 'BRG-' . str_pad($t['id_barang'], 3, '0', STR_PAD_LEFT) ?></code>
                                    </td>
                                    <td data-label="Nama Barang">
                                        <span class="fw-semibold"><?= $t['nama_barang'] ?></span>
                                    </td>
                                    <td data-label="Jumlah">
                                        <span class="<?= $t['jenis_transaksi'] == 'masuk' ? 'jumlah-masuk' : 'jumlah-keluar' ?>">
                                            <?= $t['jenis_transaksi'] == 'masuk' ? '+' : '-' ?><?= number_format($t['jumlah']) ?>
                                        </span>
                                        <small class="text-muted">pcs</small>
                                    </td>
                                    <td data-label="Operator">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-placeholder" style="width: 28px; height: 28px; background: #eef2f7; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-user text-muted" style="font-size: 12px;"></i>
                                            </div>
                                            <span><?= $t['operator'] ?? 'System' ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                    <p class="mb-0">Belum ada data transaksi</p>
                                    <small>Silakan tambahkan transaksi barang masuk atau keluar</small>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination - FIXED without foreach on links() -->
        <?php if (isset($pager) && $pager->getPageCount() > 1): ?>
        <div class="card-footer bg-white border-top-0 py-3">
            <nav aria-label="Page navigation">
                <?= $pager->links('default', 'default_full') ?>
            </nav>
            <div class="text-center mt-2">
                <small class="text-muted">
                    Halaman <?= $pager->getCurrentPage() ?> dari <?= $pager->getPageCount() ?>
                    (Total <?= $pager->getTotal() ?> data)
                </small>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Info Card -->
    <div class="card border-0 shadow-sm bg-light mt-4">
        <div class="card-body py-3">
            <div class="d-flex align-items-center gap-3">
                <i class="fas fa-info-circle text-primary fs-5"></i>
                <div>
                    <small class="text-muted">
                        <strong>Informasi:</strong> Transaksi barang masuk akan menambah stok, 
                        sedangkan transaksi barang keluar akan mengurangi stok. 
                        Setiap transaksi dicatat beserta waktu dan operator yang melakukan.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filter & Search Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterJenis = document.getElementById('filterJenis');
    const filterStartDate = document.getElementById('filterStartDate');
    const filterEndDate = document.getElementById('filterEndDate');
    const searchInput = document.getElementById('searchInput');
    const btnReset = document.getElementById('btnReset');
    const btnExport = document.getElementById('btnExport');
    const rows = document.querySelectorAll('.transaksi-row');
    
    function filterTable() {
        const jenis = filterJenis.value;
        const startDate = filterStartDate.value;
        const endDate = filterEndDate.value;
        const search = searchInput.value.toLowerCase();
        
        rows.forEach(row => {
            let show = true;
            
            // Filter jenis
            if (jenis !== 'all' && row.dataset.jenis !== jenis) {
                show = false;
            }
            
            // Filter tanggal
            if (show && startDate && endDate) {
                const tanggalCell = row.cells[1];
                const tanggalText = tanggalCell?.innerText || '';
                const rowDate = parseDateFromTable(tanggalText);
                const start = new Date(startDate);
                const end = new Date(endDate);
                
                if (rowDate < start || rowDate > end) {
                    show = false;
                }
            }
            
            // Filter search
            if (show && search) {
                const namaBarang = row.cells[4]?.innerText.toLowerCase() || '';
                const kodeBarang = row.cells[3]?.innerText.toLowerCase() || '';
                if (!namaBarang.includes(search) && !kodeBarang.includes(search)) {
                    show = false;
                }
            }
            
            row.style.display = show ? '' : 'none';
        });
    }
    
    function parseDateFromTable(dateText) {
        // Parse tanggal dari format "dd/mm/yyyy"
        const parts = dateText.trim().split('/');
        if (parts.length === 3) {
            return new Date(parts[2], parts[1] - 1, parts[0]);
        }
        return new Date(0);
    }
    
    function resetFilters() {
        filterJenis.value = 'all';
        filterStartDate.value = '';
        filterEndDate.value = '';
        searchInput.value = '';
        rows.forEach(row => row.style.display = '');
    }
    
    function exportToCSV() {
        const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
        if (visibleRows.length === 0) {
            alert('Tidak ada data untuk diexport');
            return;
        }
        
        let csvContent = "ID,Tanggal,Jenis Transaksi,Kode Barang,Nama Barang,Jumlah,Operator\n";
        
        visibleRows.forEach(row => {
            const cells = row.cells;
            csvContent += `"${cells[0]?.innerText.replace(/#/g, '') || ''}",`;
            csvContent += `"${cells[1]?.innerText.split('\n')[0] || ''}",`;
            csvContent += `"${cells[2]?.innerText.trim() || ''}",`;
            csvContent += `"${cells[3]?.innerText || ''}",`;
            csvContent += `"${cells[4]?.innerText || ''}",`;
            csvContent += `"${cells[5]?.innerText.replace(/[^0-9-+]/g, '') || ''}",`;
            csvContent += `"${cells[6]?.innerText.replace(/\n/g, ' ').trim() || ''}"\n`;
        });
        
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        link.setAttribute('download', 'transaksi_export.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }
    
    // Event listeners
    filterJenis.addEventListener('change', filterTable);
    filterStartDate.addEventListener('change', filterTable);
    filterEndDate.addEventListener('change', filterTable);
    searchInput.addEventListener('keyup', filterTable);
    btnReset.addEventListener('click', resetFilters);
    btnExport.addEventListener('click', exportToCSV);
});
</script>

<?= $this->endSection() ?>