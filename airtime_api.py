import requests

API_KEY = 'YOUR_API_KEY'  # Replace with your actual API key
BASE_URL = 'https://api.yourairtimeservice.com'

headers = {
    'Authorization': f'Bearer {API_KEY}',
    'Content-Type': 'application/json'
}

# Check Balance
def check_balance():
    url = f'{BASE_URL}/api/v1/balance'
    response = requests.get(url, headers=headers)
    print(response.json())

# Purchase Airtime
def purchase_airtime(mobile_number, amount):
    url = f'{BASE_URL}/api/v1/topup'
    data = {
        'mobile_number': mobile_number,
        'amount': amount,
        'currency': 'USD'
    }
    response = requests.post(url, headers=headers, json=data)
    print(response.json())

# Check Transaction Status
def check_transaction_status(transaction_id):
    url = f'{BASE_URL}/api/v1/transaction/{transaction_id}'
    response = requests.get(url, headers=headers)
    print(response.json())

# Example usage
check_balance()
purchase_airtime('+1234567890', 10.00)
check_transaction_status('1234567890ABC')
