import React, { useState } from 'react';

function Calculator() {
  const [result, setResult] = useState('');

  const handleClick = (e) => {
    e.preventDefault();
    const inputValue = e.target.value;
    const operator = inputValue[inputValue.length - 1];
    const operand = parseInt(inputValue.substring(0, inputValue.length - 1));
    let result = '';

    switch (operator) {
      case '+':
        result = operand + parseInt(result);
        break;
      case '-':
        result = operand - parseInt(result);
        break;
      case '*':
        result = operand * parseInt(result);
        break;
      case '/':
        result = operand / parseInt(result);
        break;
    }

    setResult(result.toString());
  };

  return (
    <div>
      <h1>Calculator</h1>
      <form onSubmit={handleClick}>
        <input type="text" value={inputValue} onChange={e => handleChange(e)} />
        <button type="submit">Calculate</button>
      </form>
      <p>{result}</p>
    </div>
  );
}