import {isNavigationFailure} from "vue-router/src/util/errors";

export const goToHome = () => {
    SPA.$router.push('/')
        .catch( err => isNavigationFailure(err) ? console.log("redirected") : console.error(err));
}
export const modifyProduct = (product, indexInProductList) => {
    product.indexInList = indexInProductList;
    Store.productToModify = product;
    SPA.$router.push('/modify');
}

const getError = (err) => {
    return err.response.data.errors.products[0];
}

export const sendOrder = (products) => {
    return axios.post('api/order', {'products': products})
        .then(response => 200)
        .catch(err => getError(err));
}

const removeNonDigits = (value) => {
    return value.replace(/\D/g, "");
}

const notOnlyDigitsAndSpaces = (value) => {
    return /[^0-9-\s]+/.test(value);
}

export const creditCardIsValid = (value) => {
    // Accept only digits, dashes or spaces
    if (notOnlyDigitsAndSpaces(value)) return false;

    //Luhn Algorithm
    let nCheck = 0, bEven = false;
    value = removeNonDigits(value);

    for (let n = value.length - 1; n >= 0; n--) {
        let cDigit = value.charAt(n),
            nDigit = parseInt(cDigit, 10);

        if (bEven && (nDigit *= 2) > 9) nDigit -= 9;

        nCheck += nDigit;
        bEven = !bEven;
    }

    return (nCheck % 10) == 0;
}

export default {
    modifyProduct
}

