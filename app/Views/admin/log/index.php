<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-history"></i>
        Log Aktivitas
    </h1>

    <div class="date-time">
        <i class="fas fa-clock"></i>
        <span class="date"><?= date('d M Y') ?></span>
        <span class="time" id="liveTime"></span>
    </div>
</div>

<!-- Filter Card -->
<div class="section-card mb-4">
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Filter User</label>
                <select class="form-select" id="filterUser">
                    <option value="">Semua User</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Filter Aktivitas</label>
                <select class="form-select" id="filterActivity">
                    <option value="">Semua Aktivitas</option>
                    <option value="masuk">Masuk</option>
                    <option value="keluar">Keluar</option>
                    <option value="update">Update</option>
                    <option value="hapus">Hapus</option>
                    <option value="tambah">Tambah</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="filterDate">
            </div>
        </div>
    </div>
</div>

<!-- Card Log -->
<div class="section-card">
    <div class="card-header-custom">
        <h6><i class="fas fa-list"></i> Riwayat Aktivitas Sistem</h6>
        <div>
            <span class="badge bg-primary" id="totalCount">0</span>
            <button class="btn btn-sm btn-outline-primary ms-2" onclick="refreshLogs()">
                <i class="fas fa-sync-alt"></i> Refresh
            </button>
            <button class="btn btn-sm btn-outline-secondary ms-2" onclick="exportLogs()">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>

    <div class="card-body-custom">

        <div class="table-responsive">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody id="logTableBody"></tbody>
            </table>
        </div>

        <!-- Loading -->
        <div id="loadingState" class="text-center py-4" style="display:none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-muted mt-2">Memuat data...</p>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="text-center py-5" style="display:none;">
            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
            <p class="text-muted">Belum ada aktivitas</p>
        </div>

        <!-- Pagination -->
        <div id="paginationContainer" class="d-flex justify-content-between align-items-center mt-4" style="display:none;">
            <div class="text-muted">
                Menampilkan <span id="startEntry">0</span> - <span id="endEntry">0</span> dari <span id="totalEntries">0</span> entri
            </div>
            <nav>
                <ul class="pagination mb-0" id="pagination">
                    <!-- Pagination will be inserted here -->
                </ul>
            </nav>
        </div>

    </div>
</div>

<style>
.log-new {
    animation: fadeHighlight 1s ease;
    background: rgba(16, 185, 129, 0.08);
}

@keyframes fadeHighlight {
    from { background: rgba(16, 185, 129, 0.3); }
    to { background: transparent; }
}

.badge-aktivitas {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 5px;
}

.badge-masuk { background: #d1fae5; color: #10b981; }
.badge-keluar { background: #fee2e2; color: #ef4444; }
.badge-update { background: #dbeafe; color: #2563eb; }
.badge-hapus { background: #fef3c7; color: #f59e0b; }
.badge-other { background: #f3f4f6; color: #6b7280; }

.log-time {
    font-size: 13px;
    color: var(--gray-500);
}

.operator-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.user-avatar-small {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #4e73df, #224abe);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.pagination {
    gap: 5px;
}

.pagination .page-item .page-link {
    border-radius: 8px;
    padding: 8px 14px;
    color: #4e73df;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.pagination .page-item.active .page-link {
    background: #4e73df;
    border-color: #4e73df;
    color: white;
}

.pagination .page-item .page-link:hover {
    background: #f7f9fc;
    transform: translateY(-2px);
}

.filter-bar {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
}
</style>

<script>
let currentPage = 1;
let totalData = 0;
let perPage = 10;
let isLoading = false;
let lastLogTime = null;
let currentFilters = {
    user: '',
    activity: '',
    date: ''
};

// realtime clock
function updateTime() {
    const now = new Date();
    const timeElement = document.getElementById('liveTime');
    if (timeElement) {
        timeElement.innerText = now.toLocaleTimeString('id-ID');
    }
}
setInterval(updateTime, 1000);
updateTime();

// format waktu
function formatTime(datetime) {
    if (!datetime) return '-';
    const d = new Date(datetime);
    return d.toLocaleString('id-ID', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
}

// tentukan badge
function getBadge(text) {
    const lowerText = text.toLowerCase();
    if (lowerText.includes('masuk')) return '<span class="badge-aktivitas badge-masuk"><i class="fas fa-arrow-down me-1"></i>Masuk</span>';
    if (lowerText.includes('keluar')) return '<span class="badge-aktivitas badge-keluar"><i class="fas fa-arrow-up me-1"></i>Keluar</span>';
    if (lowerText.includes('update') || lowerText.includes('edit')) return '<span class="badge-aktivitas badge-update"><i class="fas fa-edit me-1"></i>Update</span>';
    if (lowerText.includes('hapus') || lowerText.includes('delete')) return '<span class="badge-aktivitas badge-hapus"><i class="fas fa-trash me-1"></i>Hapus</span>';
    if (lowerText.includes('tambah') || lowerText.includes('menambahkan')) return '<span class="badge-aktivitas badge-masuk"><i class="fas fa-plus me-1"></i>Tambah</span>';
    return '<span class="badge-aktivitas badge-other"><i class="fas fa-info-circle me-1"></i>Aktivitas</span>';
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: ${type === 'success' ? '#10b981' : '#ef4444'};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideInRight 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    toast.innerHTML = `<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i> ${message}`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

function updatePagination() {
    const totalPages = Math.ceil(totalData / perPage);
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';
    
    // Previous button
    if (currentPage > 1) {
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        `;
    }
    
    // Page numbers
    let startPage = Math.max(1, currentPage - 2);
    let endPage = Math.min(totalPages, currentPage + 2);
    
    if (startPage > 1) {
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(1); return false;">1</a>
            </li>
        `;
        if (startPage > 2) {
            paginationContainer.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
        }
    }
    
    for (let i = startPage; i <= endPage; i++) {
        paginationContainer.innerHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>
        `;
    }
    
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationContainer.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
        }
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(${totalPages}); return false;">${totalPages}</a>
            </li>
        `;
    }
    
    // Next button
    if (currentPage < totalPages) {
        paginationContainer.innerHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        `;
    }
    
    // Update info text
    const startEntry = ((currentPage - 1) * perPage) + 1;
    const endEntry = Math.min(currentPage * perPage, totalData);
    document.getElementById('startEntry').innerText = startEntry;
    document.getElementById('endEntry').innerText = endEntry;
    document.getElementById('totalEntries').innerText = totalData;
}

function changePage(page) {
    if (page === currentPage || isLoading) return;
    currentPage = page;
    fetchLogs(true);
}

function fetchLogs(reset = true) {
    if (isLoading) return;
    
    isLoading = true;
    
    if (reset) {
        document.getElementById('logTableBody').innerHTML = '';
        document.getElementById('paginationContainer').style.display = 'none';
    }
    
    document.getElementById('loadingState').style.display = 'block';
    document.getElementById('emptyState').style.display = 'none';

    // Build query string with filters
    let queryParams = new URLSearchParams({
        page: currentPage,
        limit: perPage
    });
    
    if (currentFilters.user) queryParams.append('user', currentFilters.user);
    if (currentFilters.activity) queryParams.append('activity', currentFilters.activity);
    if (currentFilters.date) queryParams.append('date', currentFilters.date);

    fetch(`<?= base_url('log/getLogs') ?>?${queryParams.toString()}`)
        .then(res => res.json())
        .then(response => {
            isLoading = false;
            document.getElementById('loadingState').style.display = 'none';
            
            if (response.success) {
                const logs = response.data;
                totalData = response.total;
                
                document.getElementById('totalCount').innerText = totalData;
                
                if (logs.length === 0 && totalData === 0) {
                    document.getElementById('emptyState').style.display = 'block';
                    document.getElementById('paginationContainer').style.display = 'none';
                    return;
                }
                
                const tbody = document.getElementById('logTableBody');
                
                if (reset) {
                    tbody.innerHTML = '';
                }
                
                const newestTime = logs.length > 0 ? logs[0].created_at : null;
                
                if (reset && lastLogTime && newestTime && newestTime !== lastLogTime) {
                    showToast('Aktivitas baru terdeteksi!', 'success');
                }
                
                lastLogTime = newestTime;
                
                logs.forEach((log, index) => {
                    const isNew = reset && index === 0 ? 'log-new' : '';
                    
                    tbody.innerHTML += `
                        <tr class="${isNew}">
                            <td data-label="Waktu">
                                <div class="log-time">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    ${formatTime(log.created_at)}
                                </div>
                            </td>
                            <td data-label="User">
                                <div class="operator-cell">
                                    <div class="user-avatar-small">
                                        ${(log.user?.charAt(0) || 'S').toUpperCase()}
                                    </div>
                                    ${log.user || 'Sistem'}
                                </div>
                            </td>
                            <td data-label="Aktivitas">
                                ${getBadge(log.aktivitas)}
                                <div class="mt-1 small">${log.aktivitas}</div>
                            </td>
                        </tr>
                    `;
                });
                
                // Show pagination if more than one page
                if (totalData > perPage) {
                    document.getElementById('paginationContainer').style.display = 'flex';
                    updatePagination();
                } else {
                    document.getElementById('paginationContainer').style.display = 'none';
                }
            } else {
                console.error('Error:', response.error);
                if (totalData === 0) {
                    document.getElementById('emptyState').style.display = 'block';
                    document.getElementById('paginationContainer').style.display = 'none';
                }
            }
        })
        .catch(error => {
            isLoading = false;
            console.error('Error:', error);
            document.getElementById('loadingState').style.display = 'none';
            showToast('Gagal memuat data', 'error');
            if (totalData === 0) {
                document.getElementById('emptyState').style.display = 'block';
                document.getElementById('paginationContainer').style.display = 'none';
            }
        });
}

function refreshLogs() {
    currentPage = 1;
    fetchLogs(true);
}

function viewDetail(logId) {
    // Implement detail view modal
    showToast('Detail log ID: ' + logId, 'success');
}

function exportLogs() {
    let queryParams = new URLSearchParams();
    if (currentFilters.user) queryParams.append('user', currentFilters.user);
    if (currentFilters.activity) queryParams.append('activity', currentFilters.activity);
    if (currentFilters.date) queryParams.append('date', currentFilters.date);
    
    window.location.href = `<?= base_url('log/exportLogs') ?>?${queryParams.toString()}`;
}

// Filter handlers
document.getElementById('filterUser').addEventListener('change', function(e) {
    currentFilters.user = e.target.value;
    currentPage = 1;
    fetchLogs(true);
});

document.getElementById('filterActivity').addEventListener('change', function(e) {
    currentFilters.activity = e.target.value;
    currentPage = 1;
    fetchLogs(true);
});

document.getElementById('filterDate').addEventListener('change', function(e) {
    currentFilters.date = e.target.value;
    currentPage = 1;
    fetchLogs(true);
});

// Load users for filter
function loadUsers() {
    fetch('<?= base_url('log/getUsers') ?>')
        .then(res => res.json())
        .then(response => {
            if (response.success && response.data) {
                const userSelect = document.getElementById('filterUser');
                response.data.forEach(user => {
                    userSelect.innerHTML += `<option value="${user.id}">${user.name}</option>`;
                });
            }
        })
        .catch(error => console.error('Error loading users:', error));
}

// initial load
loadUsers();
fetchLogs(true);

setInterval(() => {
    if (!isLoading) {
        fetchLogs(true);
    }
}, 30000);
</script>

<?= $this->endSection() ?>