javascript
import React, { useState } from 'react';
import Multiplication from './multiplication';

function NumeralConverter() {
  const [number, setNumber] = useState(0);
  const [convertedNumber, setConvertedNumber] = useState(0);

  const handleChange = (event) => {
    const inputValue = event.target.value;
    const isNegative = inputValue.startsWith('-');

    if (isNegative) {
      setNumber(-inputValue.slice(1));
    } else {
      setNumber(inputValue);
    }
  };

  const handleConvert = () => {
    if (number < 0) {
      setConvertedNumber(number * -1);
    } else {
      setConvertedNumber(number);
    }
  };

  return (
    <>
      <input type="text" value={number} onChange={handleChange} />
      <button onClick={handleConvert}>Convertir</button>
      <div>{convertedNumber}</div>
    </>
  );
}

export default NumeralConverter;