import React from 'react';
import { render, fireEvent } from '@testing-library/react';

// Composant de multiplication
function Multiplication() {
  const [number1, setNumber1] = React.useState(0);
  const [number2, setNumber2] = React.useState(0);
  const [result, setResult] = React.useState(0);

  const handleChangeNumber1 = (event) => {
    setNumber1(parseInt(event.target.value));
  };

  const handleChangeNumber2 = (event) => {
    setNumber2(parseInt(event.target.value));
  };

  const handleClick = () => {
    setResult(number1 * number2);
  };

  return (
    <div>
      <h3>Multiplication</h3>
      <input type="text" value={number1} onChange={handleChangeNumber1} />
      <input type="text" value={number2} onChange={handleChangeNumber2} />
      <button onClick={handleClick}>Multiplier</button>
      <p>{result}</p>
    </div>
  );
}

// Composant de test pour la multiplication
function MultiplicationTest() {
  it('should multiply two numbers', () => {
    const { getByText, getByPlaceholderText } = render(<Multiplication />);
    fireEvent.change(getByPlaceholderText('Number 1'), { target: { value: '5' } });
    fireEvent.change(getByPlaceholderText('Number 2'), { target: { value: '3' } });
    fireEvent.click(getByText('Multiplier'));
    expect(getByText('15')).toBeInTheDocument();
  });
}