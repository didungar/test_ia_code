import { useState } from 'react';

const Divide = () => {
  const [dividend, setDividend] = useState(0);
  const [divisor, setDivisor] = useState(1);
  const [result, setResult] = useState(0);

  const handleChange = (event) => {
    const { name, value } = event.target;
    if (name === 'dividend') {
      setDividend(value);
    } else if (name === 'divisor') {
      setDivisor(value);
    }
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    if (dividend !== 0 && divisor !== 0) {
      const result = dividend / divisor;
      setResult(result);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="dividend">Dividend:</label>
        <input type="number" name="dividend" value={dividend} onChange={handleChange} />
        <br />
        <label htmlFor="divisor">Divisor:</label>
        <input type="number" name="divisor" value={divisor} onChange={handleChange} />
        <br />
        <button type="submit">Calculate</button>
      </form>
      {result !== 0 && (
        <p>Result: {result}</p>
      )}
    </div>
  );
};