javascript
import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import App from './App';

test('renders learn react link', () => {
  const { getByText } = render(<App />);
  const linkElement = getByText(/learn react/i);
  expect(linkElement).toBeInTheDocument();
});

test('button click updates count', () => {
  const { getByText, rerender } = render(<App />);
  const buttonElement = getByText('+');
  fireEvent.click(buttonElement);
  expect(getByText(/count is:/i)).toHaveTextContent('Count is: 1');
});