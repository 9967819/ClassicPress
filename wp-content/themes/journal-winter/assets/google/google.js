/****
 *  google.js - simple Google Wallet client/endpoint in modern javascript
 *  Copyright 2023 Etienne Robillard <smart@open-neurosecurity.org>
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program. If not, see <https://www.gnu.org/licenses/>.
 **/

// Google API version (Step 1) 
const baseRequest = {
  apiVersion: 2,
  apiVersionMinor: 0
};

// Payment provider setup (Step 2)
// (Stripe) : GooglePay->Stripe->Bank->me->cat 
const tokenizationSpecification = {
  type: 'PAYMENT_GATEWAY',
  parameters: {
    'gateway': 'stripe',
    'gatewayMerchantId': 'pk_live_51Npx1HIv4lKWSs5Cpv6Tuob0DoEpgLLicd7CN4l49TNGyIKUKTZKUe7ZggpOcFANLDq2sPMyrrZy1utKRgpJPGL700wDyoHrsa'
  }
};

const allowedCardNetworks = ["INTERAC", "MASTERCARD", "VISA", "AMEX"];
const allowedCardAuthMethods = ["PAN_ONLY",] // "CRYPTOGRAM_3DS"
const baseCardPaymentMethod = {
  type: 'CARD',
  parameters: {
    allowedAuthMethods: allowedCardAuthMethods,
    allowedCardNetworks: allowedCardNetworks
  }
};
const cardPaymentMethod = Object.assign(
  {tokenizationSpecification: tokenizationSpecification},
  baseCardPaymentMethod
);

const isReadyToPayRequest = Object.assign({}, baseRequest);
isReadyToPayRequest.allowedPaymentMethods = [baseCardPaymentMethod];
