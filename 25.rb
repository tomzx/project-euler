def fib(n1, n2)
  n1 + n2
end

last = 1
number = 1
i = 2
while number.to_s.length != 1000 do
  tmp = number
  number = fib(number, last)
  #puts number
  last = tmp
  i += 1
end
puts i