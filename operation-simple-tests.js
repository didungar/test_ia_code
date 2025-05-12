// operation-simple-tests.js
import React from 'react';
import renderer from 'react-test-renderer';

describe('OperationSimple', () => {
  it('should return the result of adding two numbers', () => {
    const wrapper = shallow(<OperationSimple />);
    const result = wrapper.find('#result').text();
    expect(result).toEqual("3");
  });

  it('should return the result of subtracting two numbers', () => {
    const wrapper = shallow(<OperationSimple />);
    const result = wrapper.find('#result').text();
    expect(result).toEqual("-1");
  });
});