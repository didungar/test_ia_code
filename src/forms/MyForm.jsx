import React, { useState } from 'react';

function Calculator() {
  const [total, setTotal] = useState(0);
  const [num1, setNum1] = useState('');
  const [num2, setNum2] = useState('');
  const [operator, setOperator] = useState('+');

  // Format the number to have two decimal places and thousands separator
  function formatNumber(number) {
    return parseFloat(number).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Calculate the total based on the selected operator
  function calculateTotal() {
    if (operator === '+') {
      return parseFloat(num1) + parseFloat(num2);
    } else if (operator === '-') {
      return parseFloat(num1) - parseFloat(num2);
    } else if (operator === '*') {
      return parseFloat(num1) * parseFloat(num2);
    } else if (operator === '/') {
      return parseFloat(num1) / parseFloat(num2);
    }
  }

  // Handle the onChange event of the input fields
  function handleInputChange(event) {
    const target = event.target;
    const value = target.value;

    if (target.name === 'num1') {
      setNum1(value);
    } else if (target.name === 'num2') {
      setNum2(value);
    } else if (target.name === 'operator') {
      setOperator(value);
    }
  }

  // Handle the onClick event of the calculate button
  function handleCalculateClick() {
    const total = calculateTotal();
    setTotal(total);
  }

  return (
    <div>
      <form>
        <label htmlFor="num1">Number 1:</label>
        <input type="text" id="num1" name="num1" value={num1} onChange={handleInputChange} />
        <br />
        <label htmlFor="operator">Operator:</label>
        <select id="operator" name="operator" value={operator} onChange={handleInputChange}>
          <option value="+">+</option>
          <option value="-">-</option>
          <option value="*">*</option>
          <option value="/">/</option>
        </select>
        <br />
        <label htmlFor="num2">Number 2:</label>
        <input type="text" id="num2" name="num2" value={num2} onChange={handleInputChange} />
        <br />
        <button onClick={handleCalculateClick}>Calculate</button>
      </form>
      <p>Result: {formatNumber(total)}</p>
    </div>
  );
}