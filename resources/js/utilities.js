export const goToHome = () => {
    SPA.$router.push('/');
}
export const modifyProduct = (product) => {
    Store.productToModify = product;
    SPA.$router.push('/modify');
}

export const sendOrder = (products) => {
    axios.post('api/order', {'products': products});
}

export const creditCardIsValid = (value) => {
    // Accept only digits, dashes or spaces
    if (/[^0-9-\s]+/.test(value)) return false;

    //Luhn Algorithm
    let nCheck = 0, bEven = false;
    value = value.replace(/\D/g, "");

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

