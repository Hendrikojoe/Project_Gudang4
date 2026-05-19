<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .table thead {
        background: linear-gradient(90deg, #e74a3b, #c0392b);
        color: white !important;
    }

    .table thead th {
        color: white !important;
        font-weight: 600;
        padding: 12px;
        background: transparent;
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #fff5f5;
        transition: 0.2s ease-in-out;
    }

    .badge-admin {
        background-color: #1cc88a;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 8px;
        color: white;
    }

    .badge-jumlah {
        background-color: #e74a3b;
        font-size: 13px;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: white;
    }

    .title-page {
        font-weight: 700;
        color: #e74a3b;
        margin: 0;
    }

    .subtitle {
        color: #6c757d;
        font-size: 14px;
        margin-top: 5px;
    }

    .btn-add {
        background: linear-gradient(90deg, #e74a3b, #c0392b);
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        color: white;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(231, 74, 59, 0.3);
        color: white;
    }

    .btn-delete {
        background: none;
        border: none;
        color: #e74a3b;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.2s;
        padding: 5px 8px;
        border-radius: 6px;
    }

    .btn-delete:hover {
        background-color: #fee2e2;
        transform: scale(1.1);
    }

    .btn-detail {
        background: none;
        border: none;
        color: #e74a3b;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.2s;
        padding: 5px 8px;
        border-radius: 6px;
    }

    .btn-detail:hover {
        background-color: #fff0f0;
        transform: scale(1.1);
    }

    .table-cell-id {
        font-weight: 700;
        color: #e74a3b;
    }

    .dataTables_wrapper .dataTables_filter {
        display: none !important;
    }

    .custom-search-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .custom-search-box {
        position: relative;
        width: 300px;
    }

    .custom-search-box input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border: 1px solid #e3e6f0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s;
        background: white;
    }

    .custom-search-box input:focus {
        outline: none;
        border-color: #e74a3b;
        box-shadow: 0 0 0 3px rgba(231, 74, 59, 0.1);
    }

    .custom-search-box input::placeholder {
        color: #adb5bd;
        font-style: italic;
    }

    .custom-search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        font-size: 14px;
    }

    .custom-search-clear {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        cursor: pointer;
        font-size: 14px;
        display: none;
    }

    .custom-search-clear:hover {
        color: #e74a3b;
    }

    .dataTables_wrapper .dataTables_info {
        float: left;
        margin-top: 15px;
        font-size: 13px;
        color: #6c757d;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: right;
        margin-top: 15px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #333 !important;
        padding: 6px 12px;
        margin: 0 3px;
        border-radius: 6px;
        background: #f8f9fc;
        border: 1px solid #e3e6f0;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(90deg, #e74a3b, #c0392b) !important;
        color: white !important;
        border: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e3e6f0 !important;
        color: #e74a3b !important;
    }

    .table-bordered {
        border: 1px solid #e3e6f0;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e3e6f0;
        vertical-align: middle;
    }

    .table tbody td {
        color: #333;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .modal-lg {
        max-width: 800px;
    }

    .toast-success {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #1cc88a;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideInRight 0.3s ease;
    }

    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @media (max-width: 768px) {
        .custom-search-wrapper { width: 100%; }
        .custom-search-box { width: 100%; }
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            float: none;
            text-align: center;
            margin-top: 15px;
        }
    }
</style>

<div class="container-fluid mt-4">
    <div class="card card-custom p-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h3 class="title-page">
                    <i class="fas fa-arrow-up me-2"></i> Barang Keluar
                </h3>
                <p class="subtitle">
                    <i class="fas fa-chart-line me-1"></i>
                    Total transaksi: <strong><?= $totalTransaksi ?? 0 ?></strong>
                </p>
            </div>
            
            <div class="d-flex gap-2">
                <div class="custom-search-wrapper">
                    <div class="custom-search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="customSearchInput" placeholder="Cari berdasarkan ID, nama barang, operator...">
                        <i class="fas fa-times custom-search-clear" id="clearSearch"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Nama Barang</th>
                        <th width="10%">Jumlah</th>
                        <th width="10%">Satuan</th>
                        <th width="18%">Tanggal</th>
                        <th width="15%">Operator</th>
                        <th width="12%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $t): ?>
                        <tr>
                            <td class="table-cell-id">#<?= $t['id'] ?></td>
                            <td class="text-start">
                                <strong><?= $t['nama_barang'] ?></strong>
                            </td>
                            <td>
                                <span class="badge-jumlah">
                                    <i class="fas fa-minus-circle me-1"></i>
                                    <?= $t['jumlah'] ?>
                                </span>
                            </td>
                            <td><?= $t['satuan'] ?? 'pcs' ?></td>
                            <td>
                                <i class="far fa-calendar-alt me-1 text-muted"></i>
                                <?= $t['tanggal_formatted'] ?>
                                <br>
                            </td>
                            <td>
                                <?php if (!empty($t['operator'])): ?>
                                    <span class="badge-admin">
                                        <i class="fas fa-user-check me-1"></i>
                                        <?= $t['operator'] ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn-detail" onclick="showDetail(<?= $t['id'] ?>)" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-delete" onclick="confirmDelete(<?= $t['id'] ?>)" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted mb-0">Belum ada transaksi barang keluar</p>
                                <small class="text-muted">Silakan tambah transaksi baru</small>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(90deg, #e74a3b, #c0392b); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle me-2"></i> Detail Transaksi Barang Keluar
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailContent" style="max-height: 70vh; overflow-y: auto;">
                <div class="text-center py-4">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Memuat data...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i> Tutup
                </button>
                <button type="button" class="btn btn-danger" onclick="printDetail()">
                    <i class="fas fa-print me-2"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
let currentDetailData = null;
let dataTable = null;

function showDetail(id) {
    const modal = new bootstrap.Modal(document.getElementById('detailModal'));
    const detailContent = document.getElementById('detailContent');
    
    detailContent.innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2 text-muted">Memuat data transaksi...</p>
        </div>
    `;
    
    modal.show();
    
    fetch(`<?= base_url('barang/keluar/detail') ?>/${id}`)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            let content = doc.querySelector('.card-body');
            if (!content) content = doc.querySelector('.container-wide .card-body');
            if (!content) content = doc.querySelector('.detail-card .card-body');
            if (!content) content = doc.querySelector('body');
            
            if (content) {
                detailContent.innerHTML = content.innerHTML;
                currentDetailData = detailContent.innerHTML;
            } else {
                detailContent.innerHTML = html;
                currentDetailData = html;
            }
        })
        .catch(error => {
            detailContent.innerHTML = `
                <div class="alert alert-danger m-3">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Gagal memuat detail transaksi. Silakan coba lagi.
                </div>
            `;
        });
}

function confirmDelete(id) {
    if (confirm('⚠️ Apakah Anda yakin ingin menghapus transaksi ini?\n\nData yang dihapus tidak dapat dikembalikan!\n\nStok barang akan dikembalikan secara otomatis.')) {
        window.location.href = `<?= base_url('barang/keluar/delete') ?>/${id}`;
    }
}

function printDetail() {
    if (currentDetailData) {
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Detail Transaksi Barang Keluar</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    body { padding: 30px; }
                    .table { width: 100%; margin-bottom: 1rem; }
                    .table th { width: 35%; background: #f8f9fc; }
                    @media print { body { padding: 0; } .no-print { display: none; } }
                </style>
            </head>
            <body>
                <div class="container">
                    <h3 class="text-center mb-4">Detail Transaksi Barang Keluar</h3>
                    ${currentDetailData}
                    <div class="text-center mt-4 no-print">
                        <button onclick="window.print()" class="btn btn-danger">Cetak</button>
                        <button onclick="window.close()" class="btn btn-secondary">Tutup</button>
                    </div>
                </div>
            </body>
            </html>
        `);
        printWindow.document.close();
    } else {
        alert('Tidak ada data untuk dicetak');
    }
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = 'toast-success';
    toast.style.background = type === 'success' ? '#1cc88a' : '#e74a3b';
    toast.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
            <span>${message}</span>
            <button class="btn-close btn-close-white ms-3" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 5000);
}

<?php if (session()->getFlashdata('success')): ?>
    showToast('<?= session()->getFlashdata('success') ?>', 'success');
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    showToast('<?= session()->getFlashdata('error') ?>', 'error');
<?php endif; ?>

$(document).ready(function() {
    const hasRealData = $('#dataTable tbody tr:first td').length > 0 && 
                        $('#dataTable tbody tr:first td').attr('colspan') === undefined;
    
    if ($.fn.DataTable && hasRealData) {
        if ($.fn.dataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
        }
        
        dataTable = $('#dataTable').DataTable({
            language: {
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "«",
                    last: "»",
                    next: "›",
                    previous: "‹"
                },
                zeroRecords: "Tidak ada data yang ditemukan"
            },
            pageLength: 99999,
            lengthChange: false,
            ordering: true,
            order: [[0, 'desc']],
            responsive: true,
            columnDefs: [
                { orderable: false, targets: 6 } 
            ]
        });
        
        $('#customSearchInput').on('keyup', function() {
            const searchValue = $(this).val();
            if (dataTable) {
                dataTable.search(searchValue).draw();
            }
            
            if (searchValue.length > 0) {
                $('.custom-search-clear').show();
            } else {
                $('.custom-search-clear').hide();
            }
        });
        
        $('#clearSearch').on('click', function() {
            $('#customSearchInput').val('').trigger('keyup');
            $(this).hide();
        });
    } else if (!hasRealData) {
        $('#customSearchInput').prop('disabled', true);
        $('.custom-search-clear').hide();
        console.log('DataTable tidak diinisialisasi karena tidak ada data');
    }
});
</script>

<?= $this->endSection() ?>