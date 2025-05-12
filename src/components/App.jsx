import React from 'react';
import { render, fireEvent } from '@testing-library/react';
import App from './App';

test('renders a heading', () => {
  const { getByText } = render(<App />);
  const heading = getByText(/Welcome to React!/i);
  expect(heading).toBeInTheDocument();
});