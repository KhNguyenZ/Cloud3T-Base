import requests
import datetime
import time

url = "https://cloud3t.com/service_api/cron_pterodactyl.php"
i = 0

while True:
    current_time = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    print(f'Hệ thống đã chạy cron lần thứ {i} vào lúc {current_time}')
    
    response = requests.get(url)
    http_code = response.status_code
    response_content = response.text
    
    log_file = 'cron_log.txt'
    log_entry = f"Time: {current_time} - HTTP Code: {http_code} - Response: {response_content}\n"
    
    with open(log_file, 'a') as f:
        f.write(log_entry)
    
    i += 1