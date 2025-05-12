import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import DivideNumbers from './DivideNumbers';

describe('<DivideNumbers />', () => {
  let wrapper;

  beforeEach(() => {
    wrapper = render(<DivideNumbers />);
  });

  afterEach(() => {
    wrapper.unmount();
  });

  it('should divide two numbers', () => {
    const num1 = 10;
    const num2 = 5;
    const result = num1 / num2;
    const inputNum1 = wrapper.getByLabelText('Number 1');
    const inputNum2 = wrapper.getByLabelText('Number 2');
    const button = wrapper.getByRole('button', { name: 'Divide' });

    fireEvent.change(inputNum1, { target: { value: num1 } });
    fireEvent.change(inputNum2, { target: { value: num2 } });
    fireEvent.click(button);

    expect(wrapper.getByText(`${num1} / ${num2} = ${result}`).textContent).toBe(`${num1} / ${num2} = ${result}`);
  });
});