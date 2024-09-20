<?php require_once('config.php');
require_once('lib/head.php');
require_once('lib/nav.php'); ?>

<body class="bg-gray-100 dark:bg-dark-primary text-gray-800 dark:text-dark-primary">
    <!-- Navigation Menu -->
    <nav class="bg-white dark:bg-dark-secondary shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-gray-800 dark:text-dark-primary">Bão số 3 Yagi</a>
                </div>
                <div class="flex items-center">
                    <a href="/" class="px-3 py-2 rounded-md font-medium text-gray-700 dark:text-dark-secondary hover:text-gray-900 dark:hover:text-dark-primary hover:bg-gray-100 dark:hover:bg-gray-700">Trang chủ</a>
                    <a href="/stats" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-dark-secondary hover:text-gray-900 dark:hover:text-dark-primary hover:bg-gray-100 dark:hover:bg-gray-700">Thống kê</a>
                    <button id="darkModeToggle" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-dark-secondary hover:text-gray-900 dark:hover:text-dark-primary hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        <a href="/">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-dark-primary mb-6">Danh sách đóng góp bão số 3 Yagi cho MTTQVN</h1>
        </a>
        <p class="text-sm text-gray-600 dark:text-dark-secondary mb-4">Theo danh sách công bố từ MTTQVN đến ngày 10/09/2024</p>
        <p class="text-sm text-gray-600 dark:text-dark-secondary mb-4">Miễn trừ trách nhiệm: Thông tin được cung cấp từ MTTQVN, chúng tôi chỉ XỬ LÝ DỮ LIỆU và giúp việc tìm kiếm, lọc dữ liệu đơn giản hơn, để xem bản gốc vui lòng truy cập: </p>
        <a href="https://www.facebook.com/thongtinchinhphu/posts/pfbid027QC8dzUuNEPWSFYdMPfyLkmbDaMMYM5JbNmz3bSBzDoXdnmNnuYFtjruy6txSQcnl" class="text-sm text-blue-500 dark:text-blue-400 mb-4">Thông tin chính phủ - Facebook</a>
        <p class="text-sm text-gray-600 dark:text-dark-secondary mb-4">Trang web được làm bởi <a class="text-sm text-blue-500 dark:text-blue-400 mb-4" href="https://www.facebook.com/KhNguyenZ.Dev/">KhNguyenZ</a></p>

        <form id="searchForm" method="GET" class="mb-8 bg-white dark:bg-dark-secondary p-6 rounded-lg shadow-md">
        <center>
        <div class="grid gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-dark-secondary mb-1">Tìm kiếm</label>
                    <input type="text" id="search" name="search" placeholder="Nội dung ck (VD: Tran Khoi Nguyen)" value=""
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-dark-primary dark:border-gray-600">
                </div>
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-dark-secondary mb-1">Tìm kiếm bằng</label>
                    <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-dark-primary dark:border-gray-600">
                        <option value="content" selected>Nội dung</option>
                        <option value="content">Số tiền</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="w-full px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Tìm kiếm
                </button>
            </div>
        </form>
        </center>
        <div class="overflow-x-auto bg-white dark:bg-dark-secondary shadow-md rounded-lg">
            <table id="data" class="min-w-full table-auto">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-dark-secondary uppercase tracking-wider">
                            Ngày
                            <button onclick="sort('Date')" class="ml-1 focus:outline-none">
                                <i class="fas fa-sort-up"></i>
                            </button>
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-dark-secondary uppercase tracking-wider">Document No</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-dark-secondary uppercase tracking-wider">
                            Số tiền (VND)
                            <button onclick="sort('Amount')" class="ml-1 focus:outline-none">
                                <i class="fas fa-sort"></i>
                            </button>
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-dark-secondary uppercase tracking-wider">Credit (VND)</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-dark-secondary uppercase tracking-wider">Nội dung</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $jsonFile = 'output.json';  // Thay thế bằng đường dẫn thực tế
                $jsonData = file_get_contents($jsonFile);

                // Giải mã JSON thành mảng PHP
                $data = json_decode($jsonData, true);

                // Lấy 1000 bản ghi đầu tiên
                $data = array_slice($data, 0, 5);

                // Lặp qua từng bản ghi trong dữ liệu JSON và tạo dòng bảng
                foreach ($data as $record) {
                    echo '<tr>';
                    echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary">' . htmlspecialchars($record['date_time']) . '</td>';
                    echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary">' . htmlspecialchars($record['trans_no']) . '</td>';

                    // Hiển thị số tiền debit hoặc credit nếu có
                    if (!empty($record['debit'])) {
                        echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary">' . htmlspecialchars($record['debit']) . '</td>';
                    } elseif (!empty($record['credit'])) {
                        echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary">' . htmlspecialchars($record['credit']) . '</td>';
                    } else {
                        echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary"></td>';
                    }

                    // Cột thứ tư để trống (bạn có thể tùy chỉnh nếu cần)
                    echo '<td class="px-4 py-2 whitespace-nowrap dark:text-dark-primary"></td>';

                    // Cột detail
                    echo '<td class="px-4 py-2 dark:text-dark-primary">' . htmlspecialchars($record['detail']) . '</td>';
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    	
new DataTable('#data');
</script>
</body>
</html>