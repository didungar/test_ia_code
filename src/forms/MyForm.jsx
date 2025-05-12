javascript
import React, { useState } from 'react';
import MathUtils from './math';

function Parentheses() {
  const [expression, setExpression] = useState('');
  const [result, setResult] = useState(null);

  function handleChange(event) {
    const value = event.target.value;
    if (MathUtils.isValidParentheses(value)) {
      setExpression(value);
    } else {
      console.error('Invalid parentheses');
    }
  }

  function handleClick() {
    try {
      const result = MathUtils.evaluate(expression);
      if (result) {
        setResult(result);
      } else {
        throw new Error('Invalid expression');
      }
    } catch (error) {
      console.error(error);
    }
  }

  return (
    <div>
      <h1>Parentheses Calculator</h1>
      <form>
        <label>Enter an expression: </label>
        <input type="text" value={expression} onChange={handleChange} />
        <button onClick={handleClick}>Evaluate</button>
      </form>
      {result && (
        <p>Result: {result}</p>
      )}
    </div>
  );
}

export default Parentheses;