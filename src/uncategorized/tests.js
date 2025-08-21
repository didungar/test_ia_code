javascript
// tests.js
import { render } from '@testing-library/react';
import { multiply } from './math';

describe('Multiplication', () => {
  it('should return the product of two numbers', () => {
    const result = multiply(2, 3);
    expect(result).toBe(6);
  });

  it('should handle negative numbers', () => {
    const result = multiply(-2, -3);
    expect(result).toBe(-6);
  });

  it('should handle floating point numbers', () => {
    const result = multiply(2.5, 3.5);
    expect(result).toBeCloseTo(8.75);
  });
});