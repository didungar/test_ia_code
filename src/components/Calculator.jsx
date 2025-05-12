javascript
import React, { useState } from 'react';
import Calculator from './calculator';

function MultiplicationAndDivision() {
  const [result, setResult] = useState(0);

  const handleMultiply = (num1, num2) => {
    const product = num1 * num2;
    setResult(product);
  };

  const handleDivide = (num1, num2) => {
    const quotient = num1 / num2;
    setResult(quotient);
  };

  return (
    <Calculator result={result} onMultiply={handleMultiply} onDivide={handleDivide} />
  );
}