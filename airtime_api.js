const axios = require('axios');

const API_KEY = 'YOUR_API_KEY';
const BASE_URL = 'https://api.airtimeprovider.com';

const headers = {
    'Authorization': `Bearer ${API_KEY}`,
    'Content-Type': 'application/json'
};

// Check Balance
async function checkBalance() {
    try {
        const response = await axios.get(`${BASE_URL}/api/v1/balance`, { headers });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
}

// Purchase Airtime
async function purchaseAirtime(mobile_number, amount) {
    try {
        const response = await axios.post(`${BASE_URL}/api/v1/topup`, {
            mobile_number,
            amount,
            currency: 'USD'
        }, { headers });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
}

// Check Transaction Status
async function checkTransactionStatus(transaction_id) {
    try {
        const response = await axios.get(`${BASE_URL}/api/v1/transaction/${transaction_id}`, { headers });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
}

// Example usage
checkBalance();
purchaseAirtime('+1234567890', 10.00);
checkTransactionStatus('1234567890ABC');
