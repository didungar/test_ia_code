import React from 'react';
import { render, fireEvent } from '@testing-library/react';

// Composant AddButton
const AddButton = () => (
  <button onClick={() => console.log('add')}>+</button>
);

// Composant SubtractButton
const SubtractButton = () => (
  <button onClick={() => console.log('subtract')}>-</button>
);

// Composant Calculator
const Calculator = ({ value, onChange }) => {
  const handleAddClick = () => {
    const newValue = value + 1;
    onChange(newValue);
  };

  const handleSubtractClick = () => {
    const newValue = value - 1;
    onChange(newValue);
  };

  return (
    <div>
      <h2>Calculator</h2>
      <p>{value}</p>
      <AddButton onClick={handleAddClick} />
      <SubtractButton onClick={handleSubtractClick} />
    </div>
  );
};

// Tests
describe('Calculator', () => {
  let component;
  const onChange = jest.fn();

  beforeEach(() => {
    component = render(<Calculator value={0} onChange={onChange} />);
  });

  it('should add correctly', () => {
    const button = component.getByRole('button', { name: '+' });
    fireEvent.click(button);
    expect(onChange).toHaveBeenCalledWith(1);
  });

  it('should subtract correctly', () => {
    const button = component.getByRole('button', { name: '-' });
    fireEvent.click(button);
    expect(onChange).toHaveBeenCalledWith(-1);
  });
});